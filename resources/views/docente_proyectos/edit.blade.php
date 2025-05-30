<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Asignación de Docente a Proyecto</h2>

        <a href="{{ route('dashboard') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('docente_proyectos.update', $docenteProyecto) }}" method="POST"
              class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf
            @method('PUT')

            <!-- Docente -->
            <div class="mb-4">
                <label class="block font-bold">Docente</label>
                <select name="docente_id" class="w-full border p-2 rounded" required>
                    <option value="">-- Selecciona un docente --</option>
                    @foreach ($docentes as $docente)
                        <option value="{{ $docente->docente_id }}"
                            {{ old('docente_id', $docenteProyecto->docente_id) == $docente->docente_id ? 'selected' : '' }}>
                            {{ $docente->nombres }}
                        </option>
                    @endforeach
                </select>
                @error('docente_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Proyecto -->
            <div class="mb-4">
                <label class="block font-bold">Proyecto</label>
                <select name="proyecto_id" class="w-full border p-2 rounded" required>
                    <option value="">-- Selecciona un proyecto --</option>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}"
                            {{ old('proyecto_id', $docenteProyecto->proyecto_id) == $proyecto->id ? 'selected' : '' }}>
                            {{ $proyecto->titulo }}
                        </option>
                    @endforeach
                </select>
                @error('proyecto_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('docente_proyectos.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>