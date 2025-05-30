<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tipos de Proyecto</h2>
        
        <a href="{{ route('dashboard') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('tipo-proyectos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo Tipo de Proyecto</a>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <table class="min-w-full bg-gray-700 shadow rounded border border-gray-300 text-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Código</th>
                    <th class="px-4 py-2 border">Descripción</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipos as $tipo)
                    <tr>
                        <td class="border px-4 py-2">{{ $tipo->id }}</td>
                        <td class="border px-4 py-2">{{ $tipo->codigo }}</td>
                        <td class="border px-4 py-2">{{ $tipo->descripcion }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('tipo-proyectos.edit', $tipo) }}" class="text-blue-600">Editar</a>
                            <form action="{{ route('tipo-proyectos.destroy', $tipo) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600" onclick="return confirm('¿Eliminar este tipo?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($tipos->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">No hay tipos de proyecto registrados.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
