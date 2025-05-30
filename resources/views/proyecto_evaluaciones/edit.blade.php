<x-app-layout>
    <x-slot name="header">
        <h1 class="text-lg font-medium">Editar ProyectoEvaluacion</h1>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('proyecto_evaluaciones.update', $proyectoEvaluacion->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="proyecto_id" class="block text-sm font-medium text-gray-700">Proyecto:</label>
                        <select name="proyecto_id" id="proyecto_id" required class="mt-1 block w-full">
                            <option value="">-- Seleccionar Proyecto --</option>
                            @foreach ($proyectos as $proyecto)
                                <option value="{{ $proyecto->id }}" 
                                    {{ (old('proyecto_id') ?? $proyectoEvaluacion->proyecto_id) == $proyecto->id ? 'selected' : '' }}>
                                    {{ $proyecto->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="evaluacion_id" class="block text-sm font-medium text-gray-700">Evaluación:</label>
                        <select name="evaluacion_id" id="evaluacion_id" required class="mt-1 block w-full">
                            <option value="">-- Seleccionar Evaluación --</option>
                            @foreach ($evaluaciones as $evaluacion)
                                <option value="{{ $evaluacion->id }}" 
                                    {{ (old('evaluacion_id') ?? $proyectoEvaluacion->evaluacion_id) == $evaluacion->id ? 'selected' : '' }}>
                                    {{ $evaluacion->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="evaluador_id" class="block text-sm font-medium text-gray-700">Evaluador:</label>
                        <select name="evaluador_id" id="evaluador_id" required class="mt-1 block w-full">
                            <option value="">-- Seleccionar Evaluador --</option>
                            @foreach ($evaluadores as $evaluador)
                                <option value="{{ $evaluador->id }}" 
                                    {{ (old('evaluador_id') ?? $proyectoEvaluacion->evaluador_id) == $evaluador->id ? 'selected' : '' }}>
                                    {{ $evaluador->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="resultados_criterios" class="block text-sm font-medium text-gray-700">Resultados Criterios:</label>
                        <textarea name="resultados_criterios" id="resultados_criterios" rows="4" required class="mt-1 block w-full">
                            {{ old('resultados_criterios') ?? $proyectoEvaluacion->resultados_criterios }}
                        </textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>