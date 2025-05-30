<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Evaluaciones</h2>
        <a href="{{ route('dashboard') }}" class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('evaluaciones.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nueva Evaluación</a>

        <table class="min-w-full bg-gray-700 shadow rounded border border-gray-300 text-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Criterio</th>
                    <th class="px-4 py-2 border">Calificación</th>
                    <th class="px-4 py-2 border">Observaciones</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evaluaciones as $evaluacion)
                    <tr>
                        <td class="border px-4 py-2">{{ $evaluacion->id }}</td>
                        <td class="border px-4 py-2">{{ $evaluacion->criterio }}</td>
                        <td class="border px-4 py-2">{{ $evaluacion->calificacion }}</td>
                        <td class="border px-4 py-2">{{ $evaluacion->observaciones ?? '-' }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('evaluaciones.edit', $evaluacion) }}" class="text-blue-400 hover:underline">Editar</a>
                            <form action="{{ route('evaluaciones.destroy', $evaluacion) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('¿Eliminar esta evaluación?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($evaluaciones->isEmpty())
                    <tr><td colspan="5" class="text-center py-4 text-gray-300">No hay evaluaciones registradas.</td></tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>