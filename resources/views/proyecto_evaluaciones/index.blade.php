<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Proyecto Evaluaciones</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <a href="{{ route('proyecto_evaluaciones.create') }}"
               class="inline-block mb-6 px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Nuevo Proyecto Evaluación
            </a>

            @if (session('success'))
                <div class="bg-green-700 text-white px-4 py-2 mb-6 rounded shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto bg-gray-800 rounded-xl shadow">
                <table class="min-w-full text-white">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left">ID</th>
                            <th class="px-6 py-3 text-left">Proyecto</th>
                            <th class="px-6 py-3 text-left">Evaluación</th>
                            <th class="px-6 py-3 text-left">Evaluador</th>
                            <th class="px-6 py-3 text-left">Resultados Criterios</th>
                            <th class="px-6 py-3 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proyectoEvaluaciones as $proyectoEvaluacion)
                            <tr class="border-t border-gray-700 hover:bg-gray-700/50 transition">
                                <td class="px-6 py-3">{{ $proyectoEvaluacion->id }}</td>
                                <td class="px-6 py-3">{{ $proyectoEvaluacion->proyecto->titulo ?? '-' }}</td>
                                <td class="px-6 py-3">{{ $proyectoEvaluacion->evaluacion->criterio ?? '-' }}</td>
                                <td class="px-6 py-3">{{ $proyectoEvaluacion->evaluador->nombres ?? '-' }}</td>
                                <td class="px-6 py-3 max-w-xs truncate">{{ $proyectoEvaluacion->resultados_criterios }}</td>
                                <td class="px-6 py-3 flex gap-2 whitespace-nowrap">
                                    <a href="{{ route('proyecto_evaluaciones.edit', $proyectoEvaluacion) }}"
                                       class="inline-block px-3 py-1 text-sm bg-yellow-500 hover:bg-yellow-600 rounded text-white transition">
                                        Editar
                                    </a>

                                    <form action="{{ route('proyecto_evaluaciones.destroy', $proyectoEvaluacion) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar esta evaluación de proyecto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 text-sm rounded transition">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-6 text-gray-400">
                                    No hay evaluaciones registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>