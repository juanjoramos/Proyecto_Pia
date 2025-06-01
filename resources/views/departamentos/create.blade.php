<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Nuevo Departamento</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    {{-- Quitamos min-h-screen para que el fondo no se extienda más allá de los botones --}}
    <div class="py-12 px-6 flex justify-center bg-gray-900">
        <form action="{{ route('departamentos.store') }}" method="POST"
              class="bg-gray-800 w-full max-w-2xl p-8 rounded-2xl shadow-lg text-white">
            @csrf

            <h3 class="text-2xl font-bold mb-6 border-b border-gray-700 pb-2">Registrar Nuevo Departamento</h3>

            {{-- Nombre --}}
            <div class="mb-5">
                <label class="block mb-2 font-semibold">Nombre del Departamento</label>
                <input type="text" name="nombre"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       value="{{ old('nombre') }}" required>
                @error('nombre')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Facultad --}}
            <div class="mb-6">
                <label class="block mb-2 font-semibold">Facultad</label>
                <select name="facultad_id"
                        class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                    <option value="">-- Seleccione una facultad --</option>
                    @foreach ($facultades as $facultad)
                        <option value="{{ $facultad->facultad_id }}"
                            {{ old('facultad_id') == $facultad->facultad_id ? 'selected' : '' }}>
                            {{ $facultad->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('facultad_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('departamentos.index') }}"
                   class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-500 transition">
                    Cancelar
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>