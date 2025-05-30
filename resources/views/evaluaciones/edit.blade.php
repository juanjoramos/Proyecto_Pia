<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Evaluación</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('evaluaciones.update', $evaluacion) }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">Criterio</label>
                <input type="text" name="criterio" value="{{ old('criterio', $evaluacion->criterio) }}" class="w-full border p-2 rounded" required>
                @error('criterio')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Calificación</label>
                <input type="number" name="calificacion" value="{{ old('calificacion', $evaluacion->calificacion) }}" class="w-full border p-2 rounded" min="0" max="5" required>
                @error('calificacion')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Observaciones</label>
                <textarea name="observaciones" class="w-full border p-2 rounded" rows="3">{{ old('observaciones', $evaluacion->observaciones) }}</textarea>
                @error('observaciones')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('evaluaciones.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
