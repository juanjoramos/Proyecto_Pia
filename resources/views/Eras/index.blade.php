<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Era</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <a href="{{ route('eras.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition mb-6 inline-block">
                Nueva Era
            </a>

            @if (session('success'))
                <div class="bg-green-700 text-white px-4 py-2 mb-6 rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto bg-gray-800 rounded-xl shadow">
                <table class="min-w-full text-white">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Nombre</th>
                            <th class="px-4 py-3 text-left">Descripción</th>
                            <th class="px-4 py-3 text-left">Evaluación</th>
                            <th class="px-4 py-3 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($eras as $era)
                            <tr class="border-t border-gray-700 hover:bg-gray-700/50 transition">
                                <td class="px-4 py-3">{{ $era->era_id }}</td>
                                <td class="px-4 py-3">{{ $era->nombre }}</td>
                                <td class="px-4 py-3">{{ $era->descripcion }}</td>
                                <td class="px-4 py-3">{{ $era->evaluacion->criterio ?? 'Sin evaluación' }}</td>
                                <td class="px-4 py-3 flex gap-2">
                                    <a href="{{ route('eras.edit', $era) }}"
                                       class="inline-block px-3 py-1 text-sm bg-yellow-500 hover:bg-yellow-600 rounded-lg text-white font-medium transition">
                                        Editar
                                    </a>

                                    <form action="{{ route('eras.destroy', $era) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar esta era?');">
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
                                <td colspan="5" class="text-center py-6 text-gray-300">
                                    No hay eras registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>