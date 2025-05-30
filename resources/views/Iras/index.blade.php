<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">IRAs</h2>
        <a href="{{ route('dashboard') }}" class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <a href="{{ route('iras.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo IRA</a>

        <table class="min-w-full bg-gray-700 shadow rounded border border-gray-300 text-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Valor</th>
                    <th class="px-4 py-2 border">Observaciones</th>
                    <th class="px-4 py-2 border">Estudiante</th>
                    <th class="px-4 py-2 border">Era</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($iras as $ira)
                    <tr>
                        <td class="border px-4 py-2">{{ $ira->ira_id }}</td>
                        <td class="border px-4 py-2">{{ intval($ira->valor) }}</td>
                        <td class="border px-4 py-2">{{ $ira->observaciones ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $ira->estudiante->nombre ?? 'Sin estudiante' }}</td>
                        <td class="border px-4 py-2">{{ $ira->era->nombre ?? 'Sin era' }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('iras.edit', $ira) }}" class="text-blue-400 hover:underline">Editar</a>
                            <form action="{{ route('iras.destroy', $ira) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('¿Eliminar este IRA?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($iras->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-300">No hay IRAs registradas.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>