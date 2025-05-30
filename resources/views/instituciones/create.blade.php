<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nueva Institución</h2>
        
        <a href="{{ route('dashboard') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('instituciones.store') }}" method="POST" 
                class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf

            <div class="mb-4">
                <label class="block font-bold">Nombre</label>
                <input type="text" name="nombre" class="w-full border p-2 rounded" required>
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Sigla</label>
                <input type="text" name="sigla" class="w-full border p-2 rounded" required>
                @error('sigla')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-2">Tipo de Institución</label>
                <div class="flex items-center mb-2">
                    <input type="radio" name="tipo" value="Pública" id="tipo_publica"
                        class="mr-2" {{ old('tipo') === 'Pública' ? 'checked' : '' }} required>
                    <label for="tipo_publica">Pública</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" name="tipo" value="Privada" id="tipo_privada"
                        class="mr-2" {{ old('tipo') === 'Privada' ? 'checked' : '' }} required>
                    <label for="tipo_privada">Privada</label>
                </div>
                @error('tipo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Descripción</label>
                <textarea name="descripcion" class="w-full border p-2 rounded" rows="3"></textarea>
                @error('descripcion')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('instituciones.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
