<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Proyecto Asignaturas</h2>

        <a href="{{ route('dashboard') }}"
           class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('proyecto_asignaturas.create') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            + Crear Nuevo
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
                    <th class="px-4 py-2 border">Asignatura</th>
                    <th class="px-4 py-2 border">Docente</th>
                    <th class="px-4 py-2 border">Grupo</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($proyectoAsignaturas as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $item->id }}</td>
                        <td class="border px-4 py-2">{{ $item->proyecto->titulo ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $item->asignatura->nombre ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $item->docente->nombres ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $item->grupo }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('proyecto_asignaturas.edit', $item) }}" class="text-blue-400 hover:underline">Editar</a>
                            <form action="{{ route('proyecto_asignaturas.destroy', $item) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('¿Eliminar este proyecto asignatura?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-300">No hay proyectos asignaturas registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
