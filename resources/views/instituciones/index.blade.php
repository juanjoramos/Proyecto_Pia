<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Instituciones</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <a href="{{ route('instituciones.create') }}"
               class="inline-block bg-blue-600 text-white px-5 py-2 rounded-lg mb-6 hover:bg-blue-700 transition">
                Nueva Institución
            </a>

            @if (session('success'))
                <div class="bg-green-900 bg-opacity-70 text-green-400 px-4 py-3 mb-6 rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto rounded-xl shadow-lg bg-gray-800">
                <table class="min-w-full text-white">
                    <thead class="bg-gray-700 border-b border-gray-600">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Nombre</th>
                            <th class="px-4 py-3 text-left">Sigla</th>
                            <th class="px-4 py-3 text-left">Tipo</th>
                            <th class="px-4 py-3 text-left">Descripción</th>
                            <th class="px-4 py-3 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse ($instituciones as $institucion)
                            <tr class="hover:bg-gray-700">
                                <td class="px-4 py-3">{{ $institucion->id }}</td>
                                <td class="px-4 py-3">{{ $institucion->nombre }}</td>
                                <td class="px-4 py-3">{{ $institucion->sigla }}</td>
                                <td class="px-4 py-3">{{ $institucion->tipo }}</td>
                                <td class="px-4 py-3">{{ $institucion->descripcion ?? '-' }}</td>
                                <td class="px-4 py-3 flex gap-2">
                                    <a href="{{ route('instituciones.edit', $institucion) }}"
                                       class="inline-block px-3 py-1 text-sm bg-yellow-500 hover:bg-yellow-600 rounded text-white transition">
                                        Editar
                                    </a>
                                    <form action="{{ route('instituciones.destroy', $institucion) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar esta institución?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-1.5 rounded-lg text-sm transition shadow">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-8 text-gray-400 italic">
                                    No hay instituciones registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>