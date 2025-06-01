<x-guest-layout>
        <div class="w-full max-w-sm bg-gray-800 text-white rounded-xl shadow-lg p-6">

                <!-- Imagen arriba del formulario -->
        <div class="flex justify-center mb-3">
            <img src="{{ asset('images/Logo_1.png') }}" alt="Descripción" class="h-24 w-auto rounded-md filter brightness-0 invert" />
        </div>

            <div class="text-center mb-4">
                <h2 class="text-2xl font-bold">¡Bienvenido!</h2>
                <p class="text-sm text-gray-400">Inicia sesión para acceder al sistema</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-3" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Correo electrónico')" class="text-white" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                        class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md text-white focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-400" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Contraseña')" class="text-white" />
                    <x-text-input id="password" type="password" name="password" required
                        class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md text-white focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-400" />
                </div>

                <!-- Remember Me + Link -->
                <div class="flex items-center justify-between text-sm mb-4">
                    <label for="remember_me" class="inline-flex items-center text-gray-300">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 mr-2">
                        Recuérdame
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-indigo-400 hover:underline" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="w-full py-2.5 rounded-md bg-indigo-600 hover:bg-indigo-700 transition font-semibold">
                        INICIAR SESIÓN
                    </button>
                </div>
            </form>
        </div>
</x-guest-layout>