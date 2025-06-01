<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Departamentos</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 bg-gray-900 min-h-screen">
        <div class="max-w-5xl mx-auto">

            <a href="{{ route('departamentos.create') }}"
               class="inline-block mb-6 px-5 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white font-semibold transition">
                Nuevo Departamento
            </a>

            @if (session('success'))
                <div class="mb-6 max-w-3xl mx-auto bg-green-800 text-green-300 px-4 py-3 rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto rounded-lg shadow-lg bg-gray-800">
                <table class="min-w-full text-white table-auto">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left uppercase font-semibold text-sm border-b border-gray-600">ID</th>
                            <th class="px-6 py-3 text-left uppercase font-semibold text-sm border-b border-gray-600">Nombre</th>
                            <th class="px-6 py-3 text-left uppercase font-semibold text-sm border-b border-gray-600">Facultad</th>
                            <th class="px-6 py-3 text-left uppercase font-semibold text-sm border-b border-gray-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($departamentos as $departamento)
                            <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                                <td class="px-6 py-4">{{ $departamento->departamento_id }}</td>
                                <td class="px-6 py-4">{{ $departamento->nombre }}</td>
                                <td class="px-6 py-4">{{ $departamento->facultad->nombre ?? '-' }}</td>
                                <td class="px-6 py-4 space-x-4">
                                    <a href="{{ route('departamentos.edit', $departamento) }}"
                                       class="inline-block px-3 py-1 text-sm bg-yellow-500 hover:bg-yellow-600 rounded-lg text-white font-medium transition">
                                        Editar
                                    </a>
                                    <form action="{{ route('departamentos.destroy', $departamento) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-block px-3 py-1 text-sm bg-red-600 hover:bg-red-700 rounded-lg text-white font-medium transition"
                                                onclick="return confirm('¿Eliminar este departamento?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-6 text-gray-400">No hay departamentos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>