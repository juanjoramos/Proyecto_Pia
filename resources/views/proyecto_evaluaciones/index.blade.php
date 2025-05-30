<x-app-layout>
    <x-slot name="header">
        <h1 class="text-lg font-medium">Proyecto Evaluaciones</h1>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Proyecto</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Evaluación</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Evaluador</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Resultados Criterios</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($proyectoEvaluaciones as $item)
                        <tr>
                            <td class="px-4 py-2">{{ $item->id }}</td>
                            <td class="px-4 py-2">{{ $item->proyecto->nombre ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $item->evaluacion->nombre ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $item->evaluador->nombre ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $item->resultados_criterios }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('proyecto_evaluaciones.edit', $item->id) }}" class="text-blue-600 hover:underline">Editar</a>
                                <!-- Puedes agregar botón para eliminar, ver detalles, etc -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="{{ route('proyecto_evaluaciones.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Crear Nuevo</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
