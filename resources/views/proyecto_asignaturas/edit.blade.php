<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Editar Proyecto Asignatura</h2>
            <a href="{{ route('proyecto_asignaturas.index') }}" 
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 bg-gray-900 min-h-screen">
        <div class="max-w-2xl mx-auto bg-gray-800 text-white p-8 rounded-xl shadow-lg">
            <form action="{{ route('proyecto_asignaturas.update', $proyectoAsignatura->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Proyecto -->
                <div class="mb-4">
                    <label for="proyecto_id" class="block font-semibold mb-1">Proyecto</label>
                    <select name="proyecto_id" id="proyecto_id" required class="w-full bg-gray-700 text-white border border-gray-600 p-2 rounded">
                        <option value="">-- Seleccionar Proyecto --</option>
                        @foreach ($proyectos as $proyecto)
                            <option value="{{ $proyecto->id }}" {{ old('proyecto_id', $proyectoAsignatura->proyecto_id) == $proyecto->id ? 'selected' : '' }}>
                                {{ $proyecto->titulo }}
                            </option>
                        @endforeach
                    </select>
                    @error('proyecto_id')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Asignatura -->
                <div class="mb-4">
                    <label for="asignatura_id" class="block font-semibold mb-1">Asignatura</label>
                    <select name="asignatura_id" id="asignatura_id" required class="w-full bg-gray-700 text-white border border-gray-600 p-2 rounded">
                        <option value="">-- Seleccionar Asignatura --</option>
                        @foreach ($asignaturas as $asignatura)
                            <option value="{{ $asignatura->asignatura_id }}" {{ old('asignatura_id', $proyectoAsignatura->asignatura_id) == $asignatura->asignatura_id ? 'selected' : '' }}>
                                {{ $asignatura->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('asignatura_id')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Docente -->
                <div class="mb-4">
                    <label for="docente_id" class="block font-semibold mb-1">Docente</label>
                    <select name="docente_id" id="docente_id" required class="w-full bg-gray-700 text-white border border-gray-600 p-2 rounded">
                        <option value="">-- Seleccionar Docente --</option>
                        @foreach ($docentes as $docente)
                            <option value="{{ $docente->docente_id }}" {{ old('docente_id', $proyectoAsignatura->docente_id) == $docente->docente_id ? 'selected' : '' }}>
                                {{ $docente->nombres }} {{ $docente->apellido ?? '' }}
                            </option>
                        @endforeach
                    </select>
                    @error('docente_id')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Grupo -->
                <div class="mb-4">
                    <label for="grupo" class="block font-semibold mb-1">Grupo</label>
                    <input type="text" name="grupo" id="grupo" class="w-full bg-gray-700 text-white border border-gray-600 p-2 rounded"
                           value="{{ old('grupo', $proyectoAsignatura->grupo) }}" required>
                    @error('grupo')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('proyecto_asignaturas.index') }}"
                       class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-500 transition">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500 transition">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>