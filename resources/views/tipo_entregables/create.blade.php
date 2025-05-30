<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuevo Tipo de Entregable</h2>

        <a href="{{ route('dashboard') }}"
           class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('tipo_entregables.store') }}" method="POST" 
              class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf

            <div class="mb-4">
                <label class="block font-bold">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full border p-2 rounded" required>
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Descripción</label>
                <textarea name="descripcion" class="w-full border p-2 rounded" rows="3">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('tipo_entregables.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>