<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Evaluadores</h2>
            <a href="{{ route('dashboard') }}"
               class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <a href="{{ route('evaluadores.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition mb-6 inline-block">
                Nuevo Evaluador
            </a>

            <div class="overflow-x-auto bg-gray-800 rounded-xl shadow-lg">
                <table class="min-w-full text-white">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Nombres</th>
                            <th class="px-4 py-3 text-left">Apellidos</th>
                            <th class="px-4 py-3 text-left">Correo</th>
                            <th class="px-4 py-3 text-left">Teléfono</th>
                            <th class="px-4 py-3 text-left">Departamento</th>
                            <th class="px-4 py-3 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($evaluadores as $evaluador)
                            <tr class="border-t border-gray-700 hover:bg-gray-700/50 transition">
                                <td class="px-4 py-3">{{ $evaluador->evaluador_id }}</td>
                                <td class="px-4 py-3">{{ $evaluador->nombres }}</td>
                                <td class="px-4 py-3">{{ $evaluador->apellidos }}</td>
                                <td class="px-4 py-3">{{ $evaluador->correo }}</td>
                                <td class="px-4 py-3">{{ $evaluador->telefono ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $evaluador->departamento ? $evaluador->departamento->nombre : '-' }}</td>
                                <td class="px-4 py-3 flex gap-2">
                                    <a href="{{ route('evaluadores.edit', $evaluador) }}"
                                       class="inline-block px-3 py-1 text-sm bg-yellow-500 hover:bg-yellow-600 rounded-lg text-white font-medium transition">
                                        Editar
                                    </a>

                                    <form action="{{ route('evaluadores.destroy', $evaluador) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar este evaluador?');" class="inline">
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
                                    No hay evaluadores registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>