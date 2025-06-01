<x-guest-layout>
    <div class="w-full max-w-sm bg-gray-800 text-white rounded-xl shadow-lg p-6">

        <!-- Imagen arriba del formulario -->
        <div class="flex justify-center mb-3">
            <img src="{{ asset('images/Logo_1.png') }}" alt="Descripción" class="h-24 w-auto rounded-md filter brightness-0 invert" />
        </div>

        <div class="text-center mb-4">
            <h2 class="text-2xl font-bold">¿Olvidaste tu contraseña?</h2>
            <p class="text-sm text-gray-400">
                No te preocupes. Ingresa tu correo electrónico y te enviaremos un enlace para restablecerla.
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-3" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <x-input-label for="email" :value="__('Correo electrónico')" class="text-white" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                    class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md text-white focus:border-indigo-500 focus:ring-indigo-500" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-400" />
            </div>

            <!-- Submit -->
            <div class="mt-4">
                <button type="submit"
                    class="w-full py-2.5 rounded-md bg-indigo-600 hover:bg-indigo-700 transition font-semibold">
                    Enviar enlace de restablecimiento
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>