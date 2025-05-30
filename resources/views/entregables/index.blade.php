<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Entregables</h2>
        <a href="{{ route('dashboard') }}" class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('entregables.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo Entregable</a>
        
        <table class="min-w-full bg-gray-700 shadow rounded border border-gray-300 text-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Descripción</th>
                    <th class="px-4 py-2 border">Fecha de Entrega</th>
                    <th class="px-4 py-2 border">Proyecto</th>
                    <th class="px-4 py-2 border">Tipo de Entregable</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entregables as $entregable)
                    <tr>
                        <td class="border px-4 py-2">{{ $entregable->entregable_id }}</td>
                        <td class="border px-4 py-2">{{ $entregable->nombre }}</td>
                        <td class="border px-4 py-2">{{ $entregable->descripcion ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $entregable->fecha_entrega->format('d/m/Y') }}</td>
                        <td class="border px-4 py-2">{{ $entregable->proyecto->nombre ?? 'Sin proyecto' }}</td>
                        <td class="border px-4 py-2">{{ $entregable->tipoEntregable->nombre ?? 'Sin tipo' }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('entregables.edit', $entregable) }}" class="text-blue-400 hover:underline">Editar</a>
                            <form action="{{ route('entregables.destroy', $entregable) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('¿Eliminar este entregable?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($entregables->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-300">No hay entregables registrados.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
