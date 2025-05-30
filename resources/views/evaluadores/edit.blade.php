<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Evaluador</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('evaluadores.update', $evaluador) }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">Nombres</label>
                <input type="text" name="nombres" value="{{ old('nombres', $evaluador->nombres) }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Apellidos</label>
                <input type="text" name="apellidos" value="{{ old('apellidos', $evaluador->apellidos) }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Correo</label>
                <input type="email" name="correo" value="{{ old('correo', $evaluador->correo) }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Teléfono</label>
                <input type="tel" name="telefono" value="{{ old('telefono', $evaluador->telefono) }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Departamento (opcional)</label>
                <select name="departamento_id" class="w-full border p-2 rounded">
                    <option value="">-- Seleccione un departamento --</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->departamento_id }}" {{ old('departamento_id', $evaluador->departamento_id) == $departamento->departamento_id ? 'selected' : '' }}>
                            {{ $departamento->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('evaluadores.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>