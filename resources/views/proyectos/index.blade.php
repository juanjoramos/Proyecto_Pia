<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Proyectos</h2>

        <a href="{{ route('dashboard') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('proyectos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            Nuevo Proyecto
        </a>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <table class="min-w-full bg-gray-700 shadow rounded border border-gray-300 text-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Título</th>
                    <th class="px-4 py-2 border">Estado</th>
                    <th class="px-4 py-2 border">Tipo de Proyecto</th>
                    <th class="px-4 py-2 border">Fecha Inicio</th>
                    <th class="px-4 py-2 border">Fecha Fin</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $proyecto)
                    <tr>
                        <td class="border px-4 py-2">{{ $proyecto->id }}</td>
                        <td class="border px-4 py-2">{{ $proyecto->titulo }}</td>
                        <td class="border px-4 py-2">{{ $proyecto->estado }}</td>
                        <td class="border px-4 py-2">{{ $proyecto->tipoProyecto->descripcion ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $proyecto->fecha_inicio->format('Y-m-d') }}</td>
                        <td class="border px-4 py-2">{{ $proyecto->fecha_fin ? $proyecto->fecha_fin->format('Y-m-d') : '-' }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('proyectos.edit', $proyecto) }}" class="text-blue-400 hover:underline">Editar</a>
                            <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('¿Eliminar este proyecto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($proyectos->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-300">No hay proyectos registrados.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
