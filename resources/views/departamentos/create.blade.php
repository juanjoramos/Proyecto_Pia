<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuevo Departamento</h2>
        
        <a href="{{ route('dashboard') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('departamentos.store') }}" method="POST" 
              class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf

            <div class="mb-4">
                <label class="block font-bold">Nombre</label>
                <input type="text" name="nombre" class="w-full border p-2 rounded" required value="{{ old('nombre') }}">
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
                            {{ old('facultad_id') == $facultad->facultad_id ? 'selected' : '' }}>
                            {{ $facultad->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('facultad_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('departamentos.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
