<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Departamento</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('departamentos.update', $departamento) }}" method="POST" 
              class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $departamento->nombre) }}" 
                       class="w-full border p-2 rounded" required>
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Facultad</label>
                <select name="facultad_id" class="w-full border p-2 rounded" required>
                    <option value="">-- Seleccione una facultad --</option>
                    @foreach ($facultades as $facultad)
                        <option value="{{ $facultad->facultad_id }}"
                            {{ old('facultad_id', $departamento->facultad_id) == $facultad->facultad_id ? 'selected' : '' }}>
                            {{ $facultad->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('facultad_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('departamentos.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>