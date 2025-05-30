<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tipos de Entregables</h2>

        <a href="{{ route('dashboard') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('tipo_entregables.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            Nuevo Tipo de Entregable
        </a>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <table class="min-w-full bg-gray-700 shadow rounded border border-gray-300 text-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Descripción</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipoEntregables as $tipoEntregable)
                    <tr>
                        <td class="border px-4 py-2">{{ $tipoEntregable->tipo_entregable_id }}</td>
                        <td class="border px-4 py-2">{{ $tipoEntregable->nombre }}</td>
                        <td class="border px-4 py-2">{{ $tipoEntregable->descripcion ?? '-' }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('tipo_entregables.edit', $tipoEntregable) }}" class="text-blue-400 hover:underline">Editar</a>
                            <form action="{{ route('tipo_entregables.destroy', $tipoEntregable) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('¿Eliminar este tipo de entregable?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($tipoEntregables->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-300">No hay tipos de entregables registrados.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
