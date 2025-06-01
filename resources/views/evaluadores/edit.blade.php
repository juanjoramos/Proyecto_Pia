<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Editar Evaluador</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 flex justify-center bg-gray-900">
        <form action="{{ route('evaluadores.update', $evaluador) }}" method="POST"
              class="bg-gray-800 w-full max-w-2xl p-8 rounded-2xl shadow-lg text-white">
            @csrf
            @method('PUT')

            <h3 class="text-2xl font-bold mb-6 border-b border-gray-700 pb-2">Editar Evaluador</h3>

            {{-- Nombres --}}
            <div class="mb-5">
                <label for="nombres" class="block mb-2 font-semibold">Nombres</label>
                <input id="nombres" type="text" name="nombres" required
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       value="{{ old('nombres', $evaluador->nombres) }}">
                @error('nombres')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Apellidos --}}
            <div class="mb-5">
                <label for="apellidos" class="block mb-2 font-semibold">Apellidos</label>
                <input id="apellidos" type="text" name="apellidos" required
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       value="{{ old('apellidos', $evaluador->apellidos) }}">
                @error('apellidos')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Correo --}}
            <div class="mb-5">
                <label for="correo" class="block mb-2 font-semibold">Correo</label>
                <input id="correo" type="email" name="correo" required
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       value="{{ old('correo', $evaluador->correo) }}">
                @error('correo')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Teléfono --}}
            <div class="mb-5">
                <label for="telefono" class="block mb-2 font-semibold">Teléfono</label>
                <input id="telefono" type="tel" name="telefono"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       value="{{ old('telefono', $evaluador->telefono) }}">
                @error('telefono')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Departamento --}}
            <div class="mb-6">
                <label for="departamento_id" class="block mb-2 font-semibold">Departamento (opcional)</label>
                <select id="departamento_id" name="departamento_id"
                        class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Seleccione un departamento --</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->departamento_id }}"
                            {{ old('departamento_id', $evaluador->departamento_id) == $departamento->departamento_id ? 'selected' : '' }}>
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
                <a href="{{ route('evaluadores.index') }}"
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