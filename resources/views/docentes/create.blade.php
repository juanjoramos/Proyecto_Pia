<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Nuevo Docente</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    {{-- Fondo sin min-h-screen, para que no se extienda demasiado --}}
    <div class="py-12 px-6 flex justify-center bg-gray-900">
        <form action="{{ route('docentes.store') }}" method="POST"
              class="bg-gray-800 w-full max-w-xl p-8 rounded-2xl shadow-lg text-white">
            @csrf

            <h3 class="text-2xl font-bold mb-6 border-b border-gray-700 pb-2">Nuevo Docente</h3>

            {{-- Nombres --}}
            <div class="mb-5">
                <label class="block mb-2 font-semibold">Nombres</label>
                <input type="text" name="nombres" value="{{ old('nombres') }}"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       required>
                @error('nombres')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Documento --}}
            <div class="mb-5">
                <label class="block mb-2 font-semibold">Documento</label>
                <input type="text" name="documento" value="{{ old('documento') }}"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       required>
                @error('documento')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Correo --}}
            <div class="mb-5">
                <label class="block mb-2 font-semibold">Correo</label>
                <input type="email" name="correo" value="{{ old('correo') }}"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       required>
                @error('correo')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Teléfono --}}
            <div class="mb-5">
                <label class="block mb-2 font-semibold">Teléfono</label>
                <input type="text" name="telefono" value="{{ old('telefono') }}"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white">
                @error('telefono')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Departamento --}}
            <div class="mb-6">
                <label class="block mb-2 font-semibold">Departamento</label>
                <select name="departamento_id" required
                        class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">Seleccione un departamento</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->departamento_id }}"
                            {{ old('departamento_id') == $departamento->departamento_id ? 'selected' : '' }}>
                            {{ $departamento->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('departamento_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('docentes.index') }}"
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