<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Editar Proyecto Evaluación</h2>
            <a href="{{ route('proyecto_evaluaciones.index') }}" 
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 bg-gray-900 min-h-screen">
        <div class="max-w-2xl mx-auto bg-gray-800 text-white p-8 rounded-xl shadow-lg">
            <form action="{{ route('proyecto_evaluaciones.update', $proyectoEvaluacion->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Proyecto -->
                <div class="mb-4">
                    <label for="proyecto_id" class="block font-semibold mb-1">Proyecto</label>
                    <select name="proyecto_id" id="proyecto_id" required class="w-full bg-gray-700 text-white border border-gray-600 p-2 rounded">
                        <option value="">-- Seleccionar Proyecto --</option>
                        @foreach ($proyectos as $proyecto)
                            <option value="{{ $proyecto->id }}" {{ old('proyecto_id', $proyectoEvaluacion->proyecto_id) == $proyecto->id ? 'selected' : '' }}>
                                {{ $proyecto->titulo }}
                            </option>
                        @endforeach
                    </select>
                    @error('proyecto_id')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Evaluación -->
                <div class="mb-4">
                    <label for="evaluacion_id" class="block font-semibold mb-1">Evaluación</label>
                    <select name="evaluacion_id" id="evaluacion_id" required class="w-full bg-gray-700 text-white border border-gray-600 p-2 rounded">
                        <option value="">-- Seleccionar Evaluación --</option>
                        @foreach ($evaluaciones as $evaluacion)
                            <option value="{{ $evaluacion->id }}" {{ old('evaluacion_id', $proyectoEvaluacion->evaluacion_id) == $evaluacion->id ? 'selected' : '' }}>
                                {{ $evaluacion->criterio }}
                            </option>
                        @endforeach
                    </select>
                    @error('evaluacion_id')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Evaluador -->
                <div class="mb-4">
                    <label for="evaluador_id" class="block font-semibold mb-1">Evaluador</label>
                    <select name="evaluador_id" id="evaluador_id" required class="w-full bg-gray-700 text-white border border-gray-600 p-2 rounded">
                        <option value="">-- Seleccionar Evaluador --</option>
                        @foreach ($evaluadores as $evaluador)
                            <option value="{{ $evaluador->evaluador_id }}" {{ old('evaluador_id', $proyectoEvaluacion->evaluador_id) == $evaluador->evaluador_id ? 'selected' : '' }}>
                                {{ $evaluador->nombres }} {{ $evaluador->apellidos }}
                            </option>
                        @endforeach
                    </select>
                    @error('evaluador_id')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Resultados Criterios -->
                <div class="mb-6">
                    <label for="resultados_criterios" class="block font-semibold mb-1">Resultados Criterios</label>
                    <textarea name="resultados_criterios" id="resultados_criterios" rows="4"
                              class="w-full bg-gray-700 text-white border border-gray-600 p-2 rounded resize-none"
                              required>{{ old('resultados_criterios', $proyectoEvaluacion->resultados_criterios) }}</textarea>
                    @error('resultados_criterios')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('proyecto_evaluaciones.index') }}"
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