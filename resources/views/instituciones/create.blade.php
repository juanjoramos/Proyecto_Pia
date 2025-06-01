<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Nueva Institución</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 flex justify-center bg-gray-900">
        <form action="{{ route('instituciones.store') }}" method="POST"
              class="bg-gray-800 w-full max-w-2xl p-8 rounded-2xl shadow-lg text-white">
            @csrf

            <h3 class="text-2xl font-bold mb-6 border-b border-gray-700 pb-2">Registrar Nueva Institución</h3>

            <div class="mb-5">
                <label class="block mb-2 font-semibold">Nombre</label>
                <input type="text" name="nombre" required
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       value="{{ old('nombre') }}">
                @error('nombre')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label class="block mb-2 font-semibold">Sigla</label>
                <input type="text" name="sigla" required
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       value="{{ old('sigla') }}">
                @error('sigla')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-semibold">Tipo de Institución</label>
                <div class="flex items-center space-x-6 mb-4">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="tipo" value="Pública" id="tipo_publica" required
                               class="text-blue-500 focus:ring-blue-400"
                               {{ old('tipo') === 'Pública' ? 'checked' : '' }}>
                        <span>Pública</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="tipo" value="Privada" id="tipo_privada" required
                               class="text-blue-500 focus:ring-blue-400"
                               {{ old('tipo') === 'Privada' ? 'checked' : '' }}>
                        <span>Privada</span>
                    </label>
                </div>
                @error('tipo')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-semibold">Descripción</label>
                <textarea name="descripcion" rows="4"
                          class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('instituciones.index') }}"
                   class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-500 transition">
                    Cancelar
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>