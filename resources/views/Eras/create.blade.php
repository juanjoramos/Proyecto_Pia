<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nueva Era</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('eras.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label class="block font-bold">Nombre</label>
                <input type="text" name="nombre" class="w-full border p-2 rounded" required value="{{ old('nombre') }}">
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label class="block font-bold">Descripción</label>
                <textarea name="descripcion" rows="3" class="w-full border p-2 rounded">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Evaluación -->
            <div class="mb-4">
                <label class="block font-bold">Evaluación</label>
                <select name="evaluacion_id" class="w-full border p-2 rounded" required>
                    <option value="">Selecciona una evaluación</option>
                    @foreach($evaluaciones as $evaluacion)
                        <option value="{{ $evaluacion->id }}" {{ old('evaluacion_id') == $evaluacion->id ? 'selected' : '' }}>
                            {{ $evaluacion->criterio }}
                        </option>
                    @endforeach
                </select>
                @error('evaluacion_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('eras.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
