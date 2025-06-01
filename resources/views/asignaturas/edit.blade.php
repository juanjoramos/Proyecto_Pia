<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Editar Asignatura</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 flex justify-center items-start bg-gray-900 min-h-screen">
        <form action="{{ route('asignaturas.update', $asignatura) }}" method="POST"
              class="bg-gray-800 w-full max-w-2xl p-8 rounded-2xl shadow-lg text-white">
            @csrf
            @method('PUT')

            <h3 class="text-2xl font-bold mb-6 border-b border-gray-700 pb-2">Editar Asignatura</h3>

            {{-- Nombre --}}
            <div class="mb-5">
                <label class="block mb-2 font-semibold">Nombre de la Asignatura</label>
                <input type="text" name="nombre" value="{{ old('nombre', $asignatura->nombre) }}"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       required>
                @error('nombre')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Código --}}
            <div class="mb-5">
                <label class="block mb-2 font-semibold">Código</label>
                <input type="text" name="codigo" value="{{ old('codigo', $asignatura->codigo) }}"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       required>
                @error('codigo')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Créditos --}}
            <div class="mb-5">
                <label class="block mb-2 font-semibold">Créditos</label>
                <input type="number" name="creditos" min="1" value="{{ old('creditos', $asignatura->creditos) }}"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       required>
                @error('creditos')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Programa --}}
            <div class="mb-6">
                <label class="block mb-2 font-semibold">Programa</label>
                <select name="programa_id"
                        class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                    <option value="">-- Seleccione un programa --</option>
                    @foreach ($programas as $programa)
                        <option value="{{ $programa->programa_id }}"
                            {{ old('programa_id', $asignatura->programa_id) == $programa->programa_id ? 'selected' : '' }}>
                            {{ $programa->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('programa_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('asignaturas.index') }}"
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