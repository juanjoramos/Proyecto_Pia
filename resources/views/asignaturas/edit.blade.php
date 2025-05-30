<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Asignatura</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('asignaturas.update', $asignatura) }}" method="POST" 
              class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $asignatura->nombre) }}" 
                       class="w-full border p-2 rounded" required>
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Código</label>
                <input type="text" name="codigo" value="{{ old('codigo', $asignatura->codigo) }}"
                       class="w-full border p-2 rounded" required>
                @error('codigo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Créditos</label>
                <input type="number" name="creditos" min="1" value="{{ old('creditos', $asignatura->creditos) }}"
                       class="w-full border p-2 rounded" required>
                @error('creditos')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Programa</label>
                <select name="programa_id" class="w-full border p-2 rounded" required>
                    <option value="">-- Seleccione un programa --</option>
                    @foreach ($programas as $programa)
                        <option value="{{ $programa->programa_id }}"
                            {{ old('programa_id', $asignatura->programa_id) == $programa->programa_id ? 'selected' : '' }}>
                            {{ $programa->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('programa_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('asignaturas.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>