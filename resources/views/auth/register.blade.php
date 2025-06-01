<x-guest-layout>
        <div class="w-full max-w-sm bg-gray-800 text-white rounded-xl shadow-lg p-6">
            <!-- Imagen arriba del formulario -->
            <div class="flex justify-center mb-3">
                <img src="{{ asset('images/Logo_1.png') }}" alt="Descripción" class="h-24 w-auto rounded-md filter brightness-0 invert" />
            </div>

            <div class="text-center mb-4">
                <h2 class="text-2xl font-bold">¡Crea tu cuenta!</h2>
                <p class="text-sm text-gray-400">Regístrate para acceder al sistema</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <x-input-label for="name" :value="__('Nombre')" class="text-white" />
                    <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                        class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md text-white focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-400" />
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Correo electrónico')" class="text-white" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                        class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md text-white focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-400" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Contraseña')" class="text-white" />
                    <x-text-input id="password" type="password" name="password" required autocomplete="new-password"
                        class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md text-white focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-400" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" class="text-white" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md text-white focus:border-indigo-500 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-400" />
                </div>

                <!-- Already registered -->
                <div class="flex items-center justify-between text-sm mb-4">
                    <a class="text-indigo-400 hover:underline" href="{{ route('login') }}">
                        ¿Ya tienes una cuenta?
                    </a>
                </div>

                <!-- Register Button -->
                <div>
                    <button type="submit"
                        class="w-full py-2.5 rounded-md bg-indigo-600 hover:bg-indigo-700 transition font-semibold">
                        REGISTRARSE
                    </button>
                </div>
            </form>
        </div>
</x-guest-layout>