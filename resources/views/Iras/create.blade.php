<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Nuevo IRA</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 bg-gray-900 min-h-screen">
        <div class="max-w-2xl mx-auto bg-gray-800 text-white p-8 rounded-2xl shadow-lg">
            <form action="{{ route('iras.store') }}" method="POST">
                @csrf

                <h3 class="text-2xl font-bold mb-6 border-b border-gray-700 pb-2">Registrar Nuevo IRA</h3>

                {{-- Valor --}}
                <div class="mb-5">
                    <label for="valor" class="block mb-2 font-semibold">Valor</label>
                    <input type="number" id="valor" step="1" name="valor"
                           class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                           value="{{ old('valor') }}" required>
                    @error('valor')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Observaciones --}}
                <div class="mb-5">
                    <label for="observaciones" class="block mb-2 font-semibold">Observaciones</label>
                    <textarea id="observaciones" name="observaciones" rows="3"
                              class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white">{{ old('observaciones') }}</textarea>
                    @error('observaciones')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Estudiante --}}
                <div class="mb-5">
                    <label for="estudiante_id" class="block mb-2 font-semibold">Estudiante</label>
                    <select name="estudiante_id" id="estudiante_id"
                            class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                        <option value="">Selecciona un estudiante</option>
                        @foreach($estudiantes as $estudiante)
                            <option value="{{ $estudiante->estudiante_id }}"
                                {{ old('estudiante_id') == $estudiante->estudiante_id ? 'selected' : '' }}>
                                {{ $estudiante->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('estudiante_id')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Era --}}
                <div class="mb-6">
                    <label for="era_id" class="block mb-2 font-semibold">Era</label>
                    <select name="era_id" id="era_id"
                            class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                        <option value="">Selecciona una era</option>
                        @foreach($eras as $era)
                            <option value="{{ $era->era_id }}"
                                {{ old('era_id') == $era->era_id ? 'selected' : '' }}>
                                {{ $era->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('era_id')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Botones --}}
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('iras.index') }}"
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
    </div>
</x-app-layout>