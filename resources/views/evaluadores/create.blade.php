<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuevo Evaluador</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('evaluadores.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf

            <div class="mb-4">
                <label class="block font-bold">Nombres</label>
                <input type="text" name="nombres" class="w-full border p-2 rounded" required value="{{ old('nombres') }}">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Apellidos</label>
                <input type="text" name="apellidos" class="w-full border p-2 rounded" required value="{{ old('apellidos') }}">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Correo</label>
                <input type="email" name="correo" class="w-full border p-2 rounded" required value="{{ old('correo') }}">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Teléfono</label>
                <input type="tel" name="telefono" class="w-full border p-2 rounded" value="{{ old('telefono') }}">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Departamento (opcional)</label>
                <select name="departamento_id" class="w-full border p-2 rounded">
                    <option value="">-- Seleccione un departamento --</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->departamento_id }}" {{ old('departamento_id') == $departamento->departamento_id ? 'selected' : '' }}>
                            {{ $departamento->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('evaluadores.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>