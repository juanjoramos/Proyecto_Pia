<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Tipos de Entregables</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 bg-gray-900 min-h-screen">
        <div class="max-w-6xl mx-auto">
            <a href="{{ route('tipo_entregables.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg mb-6 inline-block transition">
                Nuevo Tipo de Entregable
            </a>

            @if (session('success'))
                <div class="bg-green-700 text-green-100 px-4 py-3 mb-6 rounded shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto rounded-lg shadow-lg">
                <table class="min-w-full bg-gray-800 text-white rounded-lg">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="text-left px-6 py-3 border-b border-gray-600">ID</th>
                            <th class="text-left px-6 py-3 border-b border-gray-600">Nombre</th>
                            <th class="text-left px-6 py-3 border-b border-gray-600">Descripción</th>
                            <th class="text-left px-6 py-3 border-b border-gray-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tipoEntregables as $tipoEntregable)
                            <tr class="hover:bg-gray-700">
                                <td class="px-6 py-4 border-b border-gray-600">{{ $tipoEntregable->tipo_entregable_id }}</td>
                                <td class="px-6 py-4 border-b border-gray-600">{{ $tipoEntregable->nombre }}</td>
                                <td class="px-6 py-4 border-b border-gray-600">{{ $tipoEntregable->descripcion ?? '-' }}</td>
                                <td class="px-6 py-4 border-b border-gray-600 space-x-3">
                                    <a href="{{ route('tipo_entregables.edit', $tipoEntregable) }}"
                                       class="inline-block px-3 py-1 text-sm bg-yellow-500 hover:bg-yellow-600 rounded text-white transition">
                                        Editar
                                    </a>
                                    <form action="{{ route('tipo_entregables.destroy', $tipoEntregable) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-block bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded transition"
                                                onclick="return confirm('¿Eliminar este tipo de entregable?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-6 text-gray-400">
                                    No hay tipos de entregables registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>