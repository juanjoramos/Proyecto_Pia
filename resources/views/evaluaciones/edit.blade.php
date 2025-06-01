<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Editar Evaluación</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 flex justify-center bg-gray-900">
        <form action="{{ route('evaluaciones.update', $evaluacion) }}" method="POST"
              class="bg-gray-800 w-full max-w-2xl p-8 rounded-2xl shadow-lg text-white">
            @csrf
            @method('PUT')

            <h3 class="text-2xl font-bold mb-6 border-b border-gray-700 pb-2">Editar Evaluación</h3>

            {{-- Criterio --}}
            <div class="mb-5">
                <label for="criterio" class="block mb-2 font-semibold">Criterio</label>
                <input id="criterio" type="text" name="criterio"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       value="{{ old('criterio', $evaluacion->criterio) }}" required>
                @error('criterio')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Calificación --}}
            <div class="mb-5">
                <label for="calificacion" class="block mb-2 font-semibold">Calificación (0 - 5)</label>
                <input id="calificacion" type="number" name="calificacion" min="0" max="5" step="0.1"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       value="{{ old('calificacion', $evaluacion->calificacion) }}" required>
                @error('calificacion')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Observaciones --}}
            <div class="mb-6">
                <label for="observaciones" class="block mb-2 font-semibold">Observaciones</label>
                <textarea id="observaciones" name="observaciones" rows="4"
                          class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('observaciones', $evaluacion->observaciones) }}</textarea>
                @error('observaciones')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('evaluaciones.index') }}"
                   class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-500 transition">
                    Cancelar
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>