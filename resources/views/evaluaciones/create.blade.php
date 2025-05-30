<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nueva Evaluación</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('evaluaciones.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf

            <div class="mb-4">
                <label class="block font-bold">Criterio</label>
                <input type="text" name="criterio" class="w-full border p-2 rounded" required value="{{ old('criterio') }}">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Calificación</label>
                <input type="number" name="calificacion" min="0" max="5" class="w-full border p-2 rounded" required value="{{ old('calificacion') }}">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Observaciones</label>
                <textarea name="observaciones" class="w-full border p-2 rounded">{{ old('observaciones') }}</textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('evaluaciones.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>