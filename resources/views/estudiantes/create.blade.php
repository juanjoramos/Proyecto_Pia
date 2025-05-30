<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuevo Estudiante</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('estudiantes.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label class="block font-bold">Nombre</label>
                <input type="text" name="nombre" class="w-full border p-2 rounded" required value="{{ old('nombre') }}">
            </div>

            <!-- Correo -->
            <div class="mb-4">
                <label class="block font-bold">Correo</label>
                <input type="email" name="correo" class="w-full border p-2 rounded" required value="{{ old('correo') }}">
            </div>

            <!-- Código -->
            <div class="mb-4">
                <label class="block font-bold">Código</label>
                <input type="text" name="codigo" class="w-full border p-2 rounded" required value="{{ old('codigo') }}">
            </div>

            <!-- Institución -->
            <div class="mb-4">
                <label class="block font-bold">Institución</label>
                <select name="institucion_id" class="w-full border p-2 rounded" required>
                    <option value="">Selecciona una institución</option>
                    @foreach($instituciones as $institucion)
                        <option value="{{ $institucion->id }}" {{ old('institucion_id') == $institucion->id ? 'selected' : '' }}>
                            {{ $institucion->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('estudiantes.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>