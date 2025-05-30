<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Estudiante</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('estudiantes.update', $estudiante) }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nombre" class="block font-bold">Nombre</label>
                <input id="nombre" type="text" name="nombre" value="{{ old('nombre', $estudiante->nombre) }}" class="w-full border p-2 rounded" required>
                @error('nombre')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="correo" class="block font-bold">Correo</label>
                <input id="correo" type="email" name="correo" value="{{ old('correo', $estudiante->correo) }}" class="w-full border p-2 rounded" required>
                @error('correo')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="codigo" class="block font-bold">Código</label>
                <input id="codigo" type="text" name="codigo" value="{{ old('codigo', $estudiante->codigo) }}" class="w-full border p-2 rounded" required>
                @error('codigo')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="institucion_id" class="block font-bold">Institución</label>
                <select id="institucion_id" name="institucion_id" class="w-full border p-2 rounded" required>
                    <option value="">Selecciona una institución</option>
                    @foreach($instituciones as $institucion)
                        <option value="{{ $institucion->id }}" {{ old('institucion_id', $estudiante->institucion_id) == $institucion->id ? 'selected' : '' }}>
                            {{ $institucion->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('institucion_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('estudiantes.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>