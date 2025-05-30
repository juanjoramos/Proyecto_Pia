<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Eras</h2>
        <a href="{{ route('dashboard') }}" class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('eras.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nueva Era</a>

        <table class="min-w-full bg-gray-700 shadow rounded border border-gray-300 text-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Descripción</th>
                    <th class="px-4 py-2 border">Evaluación</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eras as $era)
                    <tr>
                        <td class="border px-4 py-2">{{ $era->era_id }}</td>
                        <td class="border px-4 py-2">{{ $era->nombre }}</td>
                        <td class="border px-4 py-2">{{ $era->descripcion }}</td>
                        <td class="border px-4 py-2">
                            {{ $era->evaluacion->criterio ?? 'Sin evaluación' }}
                        </td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('eras.edit', $era) }}" class="text-blue-400 hover:underline">Editar</a>
                            <form action="{{ route('eras.destroy', $era) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('¿Eliminar esta era?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($eras->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-300">No hay eras registradas.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
