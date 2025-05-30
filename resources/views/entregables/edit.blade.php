<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Entregable</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('entregables.update', $entregable) }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nombre" class="block font-bold">Nombre</label>
                <input id="nombre" type="text" name="nombre" value="{{ old('nombre', $entregable->nombre) }}" class="w-full border p-2 rounded" required>
                @error('nombre')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block font-bold">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="w-full border p-2 rounded" rows="4">{{ old('descripcion', $entregable->descripcion) }}</textarea>
                @error('descripcion')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="fecha_entrega" class="block font-bold">Fecha de Entrega</label>
                <input id="fecha_entrega" type="date" name="fecha_entrega" value="{{ old('fecha_entrega', $entregable->fecha_entrega ? $entregable->fecha_entrega->format('Y-m-d') : '') }}" class="w-full border p-2 rounded" required>
                @error('fecha_entrega')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="proyecto_id" class="block font-bold">Proyecto</label>
                <select id="proyecto_id" name="proyecto_id" class="w-full border p-2 rounded" required>
                    <option value="">Selecciona un proyecto</option>
                    @foreach($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}" {{ old('proyecto_id', $entregable->proyecto_id) == $proyecto->id ? 'selected' : '' }}>
                            {{ $proyecto->titulo }}
                        </option>
                    @endforeach
                </select>
                @error('proyecto_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tipo_entregable_id" class="block font-bold">Tipo de Entregable</label>
                <select id="tipo_entregable_id" name="tipo_entregable_id" class="w-full border p-2 rounded" required>
                    <option value="">Selecciona un tipo</option>
                    @foreach($tiposEntregable as $tipo)
                        <option value="{{ $tipo->tipo_entregable_id }}" {{ old('tipo_entregable_id', $entregable->tipo_entregable_id) == $tipo->tipo_entregable_id ? 'selected' : '' }}>
                            {{ $tipo->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('tipo_entregable_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('entregables.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
