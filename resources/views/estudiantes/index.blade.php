<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Estudiantes</h2>
        <a href="{{ route('dashboard') }}" class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('estudiantes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo Estudiante</a>
        
        <table class="min-w-full bg-gray-700 shadow rounded border border-gray-300 text-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Correo</th>
                    <th class="px-4 py-2 border">Código</th>
                    <th class="px-4 py-2 border">Institución</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantes as $estudiante)
                    <tr>
                        <td class="border px-4 py-2">{{ $estudiante->id }}</td>
                        <td class="border px-4 py-2">{{ $estudiante->nombre }}</td>
                        <td class="border px-4 py-2">{{ $estudiante->correo }}</td>
                        <td class="border px-4 py-2">{{ $estudiante->codigo }}</td>
                        <td class="border px-4 py-2">
                            {{ $estudiante->institucion->nombre ?? 'Sin institución' }}
                        </td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('estudiantes.edit', $estudiante) }}" class="text-blue-400 hover:underline">Editar</a>
                            <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('¿Eliminar este estudiante?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($estudiantes->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-300">No hay estudiantes registrados.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>