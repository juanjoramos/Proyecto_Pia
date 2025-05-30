<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Era</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('eras.update', $era) }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div class="mb-4">
                <label for="nombre" class="block font-bold">Nombre</label>
                <input id="nombre" type="text" name="nombre" value="{{ old('nombre', $era->nombre) }}" class="w-full border p-2 rounded" required>
                @error('nombre')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block font-bold">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="3" class="w-full border p-2 rounded">{{ old('descripcion', $era->descripcion) }}</textarea>
                @error('descripcion')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Evaluación -->
            <div class="mb-4">
                <label for="evaluacion_id" class="block font-bold">Evaluación</label>
                <select id="evaluacion_id" name="evaluacion_id" class="w-full border p-2 rounded" required>
                    <option value="">Selecciona una evaluación</option>
                    @foreach($evaluaciones as $evaluacion)
                        <option value="{{ $evaluacion->id }}" {{ old('evaluacion_id', $era->evaluacion_id) == $evaluacion->id ? 'selected' : '' }}>
                            {{ $evaluacion->criterio }}
                        </option>
                    @endforeach
                </select>
                @error('evaluacion_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('eras.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
