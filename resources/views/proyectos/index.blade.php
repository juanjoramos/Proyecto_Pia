<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Proyectos</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto">
            {{-- Botón Nuevo Proyecto --}}
            <a href="{{ route('proyectos.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition mb-6 inline-block">
                Nuevo Proyecto
            </a>

            {{-- Mensaje de éxito --}}
            @if (session('success'))
                <div class="bg-green-700 text-white px-4 py-2 mb-6 rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Tabla de Proyectos --}}
            <div class="overflow-x-auto bg-gray-800 rounded-xl shadow">
                <table class="min-w-full text-white">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Título</th>
                            <th class="px-4 py-3 text-left">Estado</th>
                            <th class="px-4 py-3 text-left">Tipo de Proyecto</th>
                            <th class="px-4 py-3 text-left">Fecha Inicio</th>
                            <th class="px-4 py-3 text-left">Fecha Fin</th>
                            <th class="px-4 py-3 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proyectos as $proyecto)
                            <tr class="border-t border-gray-700 hover:bg-gray-700/50 transition">
                                <td class="px-4 py-3">{{ $proyecto->id }}</td>
                                <td class="px-4 py-3">{{ $proyecto->titulo }}</td>
                                <td class="px-4 py-3">{{ $proyecto->estado }}</td>
                                <td class="px-4 py-3">{{ $proyecto->tipoProyecto->descripcion ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ $proyecto->fecha_inicio->format('Y-m-d') }}</td>
                                <td class="px-4 py-3">{{ $proyecto->fecha_fin ? $proyecto->fecha_fin->format('Y-m-d') : '-' }}</td>
                                <td class="px-4 py-3 flex gap-2">
                                    <a href="{{ route('proyectos.edit', $proyecto) }}"
                                       class="inline-block px-3 py-1 text-sm bg-yellow-500 hover:bg-yellow-600 rounded-lg text-white font-medium transition">
                                        Editar
                                    </a>

                                    <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar este proyecto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-md text-sm transition shadow">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-6 text-gray-300">
                                    No hay proyectos registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>