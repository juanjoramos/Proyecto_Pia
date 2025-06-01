<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Editar Asignación de Estudiante a Proyecto</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 flex justify-center bg-gray-900">
        <form action="{{ route('estudiante_proyectos.update', $estudianteProyecto) }}" method="POST"
              class="bg-gray-800 w-full max-w-2xl p-8 rounded-2xl shadow-lg text-white">
            @csrf
            @method('PUT')

            <h3 class="text-2xl font-bold mb-6 border-b border-gray-700 pb-2">Editar Asignación de Estudiante a Proyecto</h3>

            <!-- Estudiante -->
            <div class="mb-5">
                <label for="estudiante_id" class="block mb-2 font-semibold">Estudiante</label>
                <select name="estudiante_id" id="estudiante_id" required
                        class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Seleccionar Estudiante --</option>
                    @foreach ($estudiantes as $estudiante)
                        <option value="{{ $estudiante->estudiante_id }}" {{ old('estudiante_id', $estudianteProyecto->estudiante_id) == $estudiante->estudiante_id ? 'selected' : '' }}>
                            {{ $estudiante->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('estudiante_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Proyecto -->
            <div class="mb-5">
                <label for="proyecto_id" class="block mb-2 font-semibold">Proyecto</label>
                <select name="proyecto_id" id="proyecto_id" required
                        class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Seleccionar Proyecto --</option>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}" {{ old('proyecto_id', $estudianteProyecto->proyecto_id) == $proyecto->id ? 'selected' : '' }}>
                            {{ $proyecto->titulo }}
                        </option>
                    @endforeach
                </select>
                @error('proyecto_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('estudiante_proyectos.index') }}"
                   class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-500 transition">
                    Cancelar
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>