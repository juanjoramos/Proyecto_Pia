<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Tipo de Entregable</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('tipo_entregables.update', $tipoEntregable) }}" method="POST" 
              class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">Nombre</label>
                <input type="text" name="nombre" 
                       value="{{ old('nombre', $tipoEntregable->nombre) }}" 
                       class="w-full border p-2 rounded" required>
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Descripción</label>
                <textarea name="descripcion" 
                          class="w-full border p-2 rounded" rows="3"
                          required>{{ old('descripcion', $tipoEntregable->descripcion) }}</textarea>
                @error('descripcion')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('tipo_entregables.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>