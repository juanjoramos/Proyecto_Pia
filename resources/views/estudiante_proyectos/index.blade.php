<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Asignaciones Estudiante - Proyecto</h2>

        <a href="{{ route('dashboard') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('estudiante_proyectos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            Nueva Asignación
        </a>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <table class="min-w-full bg-gray-700 shadow rounded border border-gray-300 text-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Estudiante</th>
                    <th class="px-4 py-2 border">Proyecto</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($estudianteProyectos as $ep)
                    <tr>
                        <td class="border px-4 py-2">{{ $ep->estudiante_proyecto_id }}</td>
                        <td class="border px-4 py-2">{{ $ep->estudiante->nombre ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $ep->proyecto->titulo ?? '-' }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('estudiante_proyectos.edit', ['estudiante_proyecto' => $ep->estudiante_proyecto_id]) }}"
                               class="text-blue-400 hover:underline">Editar</a>

                            <form action="{{ route('estudiante_proyectos.destroy', ['estudiante_proyecto' => $ep->estudiante_proyecto_id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('¿Eliminar esta asignación?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-300">No hay asignaciones registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
