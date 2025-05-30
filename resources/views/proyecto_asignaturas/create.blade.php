<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nueva Asignación Proyecto - Asignatura</h2>

        <a href="{{ route('proyecto_asignaturas.index') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al listado
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('proyecto_asignaturas.store') }}" method="POST" 
                class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf

            <!-- Proyecto -->
            <div class="mb-4">
                <label class="block font-bold">Proyecto</label>
                <select name="proyecto_id" class="w-full border p-2 rounded" required>
                    <option value="" {{ old('proyecto_id') == '' ? 'selected' : '' }}>Seleccione un proyecto</option>
                    @foreach($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}" {{ old('proyecto_id') == $proyecto->id ? 'selected' : '' }}>
                            {{ $proyecto->titulo }}
                        </option>
                    @endforeach
                </select>
                @error('proyecto_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

<!-- Asignatura -->
<div class="mb-4">
    <label class="block font-bold">Asignatura</label>
    <select name="asignatura_id" class="w-full border p-2 rounded" required>
        <option value="">-- Selecciona una asignatura --</option>
        @foreach ($asignaturas as $asignatura)
            <option value="{{ $asignatura->asignatura_id }}"
                {{ old('asignatura_id') == $asignatura->asignatura_id ? 'selected' : '' }}>
                {{ $asignatura->nombre }}
            </option>
        @endforeach
    </select>
    @error('asignatura_id')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>


            <!-- Docente -->
            <div class="mb-4">
                <label class="block font-bold">Docente</label>
                <select name="docente_id" class="w-full border p-2 rounded" required>
                    <option value="">-- Selecciona un docente --</option>
                    @foreach ($docentes as $docente)
                        <option value="{{ $docente->docente_id }}"
                            {{ old('docente_id') == $docente->docente_id ? 'selected' : '' }}>
                            {{ $docente->nombres }}
                        </option>
                    @endforeach
                </select>
                @error('docente_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <!-- Grupo -->
            <div class="mb-4">
                <label class="block font-bold">Grupo</label>
                <input type="text" name="grupo" class="w-full border p-2 rounded" value="{{ old('grupo') }}" required>
                @error('grupo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botones -->
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('proyecto_asignaturas.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
