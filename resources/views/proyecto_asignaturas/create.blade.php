<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Nuevo Proyecto Asignaturas</h2>
            <a href="{{ route('proyecto_asignaturas.index') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al listado
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 flex justify-center bg-gray-900">
        <form action="{{ route('proyecto_asignaturas.store') }}" method="POST"
              class="bg-gray-800 w-full max-w-2xl p-8 rounded-2xl shadow-lg text-white">
            @csrf

            <h3 class="text-2xl font-bold mb-6 border-b border-gray-700 pb-2">Registrar Nuevo Proyecto Asignaturas</h3>

            <!-- Proyecto -->
            <div class="mb-5">
                <label for="proyecto_id" class="block mb-2 font-semibold">Proyecto</label>
                <select name="proyecto_id" id="proyecto_id" required
                        class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Seleccionar Proyecto --</option>
                    @foreach($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}" {{ old('proyecto_id') == $proyecto->id ? 'selected' : '' }}>
                            {{ $proyecto->titulo }}
                        </option>
                    @endforeach
                </select>
                @error('proyecto_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Asignatura -->
            <div class="mb-5">
                <label for="asignatura_id" class="block mb-2 font-semibold">Asignatura</label>
                <select name="asignatura_id" id="asignatura_id" required
                        class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Seleccionar Asignatura --</option>
                    @foreach($asignaturas as $asignatura)
                        <option value="{{ $asignatura->asignatura_id }}" {{ old('asignatura_id') == $asignatura->asignatura_id ? 'selected' : '' }}>
                            {{ $asignatura->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('asignatura_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Docente -->
            <div class="mb-5">
                <label for="docente_id" class="block mb-2 font-semibold">Docente</label>
                <select name="docente_id" id="docente_id" required
                        class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Seleccionar Docente --</option>
                    @foreach($docentes as $docente)
                        <option value="{{ $docente->docente_id }}" {{ old('docente_id') == $docente->docente_id ? 'selected' : '' }}>
                            {{ $docente->nombres }}
                        </option>
                    @endforeach
                </select>
                @error('docente_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Grupo -->
            <div class="mb-6">
                <label for="grupo" class="block mb-2 font-semibold">Grupo</label>
                <input type="text" name="grupo" id="grupo" required
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white
                              focus:ring-2 focus:ring-blue-500 focus:outline-none" value="{{ old('grupo') }}">
                @error('grupo')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('proyecto_asignaturas.index') }}"
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