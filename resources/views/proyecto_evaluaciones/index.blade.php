<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Proyecto Evaluaciones</h2>

        <a href="{{ route('dashboard') }}" 
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('proyecto_evaluaciones.create') }}" 
            class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            Nuevo Proyecto Evaluación
        </a>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-gray-700 shadow rounded border border-gray-300 text-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Proyecto</th>
                    <th class="px-4 py-2 border">Evaluación</th>
                    <th class="px-4 py-2 border">Evaluador</th>
                    <th class="px-4 py-2 border">Resultados Criterios</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectoEvaluaciones as $proyectoEvaluacion)
                    <tr>
                        <td class="border px-4 py-2">{{ $proyectoEvaluacion->id }}</td>
                        <td class="border px-4 py-2">{{ $proyectoEvaluacion->proyecto->titulo ?? '' }}</td>
                        <td class="border px-4 py-2">{{ $proyectoEvaluacion->evaluacion->criterio ?? '' }}</td>
                        <td class="border px-4 py-2">{{ $proyectoEvaluacion->evaluador->nombres ?? '' }}</td>
                        <td class="border px-4 py-2">{{ $proyectoEvaluacion->resultados_criterios }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('proyecto_evaluaciones.edit', $proyectoEvaluacion) }}" 
                               class="text-blue-400 hover:underline">Editar</a>
                            <form action="{{ route('proyecto_evaluaciones.destroy', $proyectoEvaluacion) }}" 
                                  method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" 
                                        onclick="return confirm('¿Eliminar esta evaluación de proyecto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($proyectoEvaluaciones->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-300">No hay evaluaciones registradas.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
