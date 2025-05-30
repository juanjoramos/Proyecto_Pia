<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Proyecto Evaluación</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('proyecto_evaluaciones.update', $proyectoEvaluacion->id) }}" method="POST" 
              class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf
            @method('PUT')

            <!-- Proyecto -->
            <div class="mb-4">
                <label class="block font-bold">Proyecto</label>
                <select name="proyecto_id" id="proyecto_id" required class="w-full border p-2 rounded">
                    <option value="">-- Seleccionar Proyecto --</option>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}" {{ old('proyecto_id', $proyectoEvaluacion->proyecto_id) == $proyecto->id ? 'selected' : '' }}>
                            {{ $proyecto->titulo }}
                        </option>
                    @endforeach
                </select>
                @error('proyecto_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

<div class="mb-4">
    <label class="block font-bold">Evaluación</label>
    <select name="evaluacion_id" id="evaluacion_id" required class="w-full border p-2 rounded">
        <option value="">-- Seleccionar Evaluación --</option>
        @foreach ($evaluaciones as $evaluacion)
            <option value="{{ $evaluacion->id }}" 
                {{ old('evaluacion_id', $proyectoEvaluacion->evaluacion_id) == $evaluacion->id ? 'selected' : '' }}>
                {{ $evaluacion->criterio }} <!-- Asegúrate que este sea el campo correcto -->
            </option>
        @endforeach
    </select>
    @error('evaluacion_id')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>


            <!-- Evaluador -->
            <div class="mb-4">
                <label class="block font-bold">Evaluador</label>
                <select name="evaluador_id" id="evaluador_id" required class="w-full border p-2 rounded">
                    <option value="">-- Seleccionar Evaluador --</option>
                    @foreach ($evaluadores as $evaluador)
                        <option value="{{ $evaluador->evaluador_id }}" {{ old('evaluador_id', $proyectoEvaluacion->evaluador_id) == $evaluador->evaluador_id ? 'selected' : '' }}>
                            {{ $evaluador->nombres }} {{ $evaluador->apellidos }}
                        </option>
                    @endforeach
                </select>
                @error('evaluador_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Resultados Criterios -->
            <div class="mb-4">
                <label class="block font-bold">Resultados Criterios</label>
                <textarea name="resultados_criterios" id="resultados_criterios" rows="4" required class="w-full border p-2 rounded">{{ old('resultados_criterios', $proyectoEvaluacion->resultados_criterios) }}</textarea>
                @error('resultados_criterios')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-between">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
                <a href="{{ route('proyecto_evaluaciones.index') }}" class="ml-4 text-gray-700">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
