<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Docentes</h2>

        <a href="{{ route('dashboard') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('docentes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            Nuevo Docente
        </a>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <table class="min-w-full bg-gray-700 shadow rounded border border-gray-300 text-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nombres</th>
                    <th class="px-4 py-2 border">Documento</th>
                    <th class="px-4 py-2 border">Correo</th>
                    <th class="px-4 py-2 border">Teléfono</th>
                    <th class="px-4 py-2 border">Departamento</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($docentes as $docente)
                    <tr>
                        <td class="border px-4 py-2">{{ $docente->docente_id }}</td>
                        <td class="border px-4 py-2">{{ $docente->nombres }}</td>
                        <td class="border px-4 py-2">{{ $docente->documento }}</td>
                        <td class="border px-4 py-2">{{ $docente->correo }}</td>
                        <td class="border px-4 py-2">{{ $docente->telefono ?? '-' }}</td>
                        <td class="border px-4 py-2">
                            {{ $docente->departamento->nombre ?? 'No asignado' }}
                        </td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('docentes.edit', $docente) }}" class="text-blue-400 hover:underline">Editar</a>
                            <form action="{{ route('docentes.destroy', $docente) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline"
                                        onclick="return confirm('¿Eliminar este docente?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-300">No hay docentes registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>