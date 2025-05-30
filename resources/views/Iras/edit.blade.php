<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar IRA</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('iras.update', $ira) }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf
            @method('PUT')

            <!-- Valor -->
            <div class="mb-4">
                <label for="valor" class="block font-bold">Valor</label>
                <input id="valor" type="number" step="1" name="valor" value="{{ old('valor', intval($ira->valor)) }}" class="w-full border p-2 rounded" required>
                @error('valor')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Observaciones -->
            <div class="mb-4">
                <label for="observaciones" class="block font-bold">Observaciones</label>
                <textarea id="observaciones" name="observaciones" rows="3" class="w-full border p-2 rounded">{{ old('observaciones', $ira->observaciones) }}</textarea>
                @error('observaciones')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Estudiante -->
            <div class="mb-4">
                <label for="estudiante_id" class="block font-bold">Estudiante</label>
                <select id="estudiante_id" name="estudiante_id" class="w-full border p-2 rounded" required>
                    <option value="">Selecciona un estudiante</option>
                        @foreach($estudiantes as $estudiante)
                            <option value="{{ $estudiante->estudiante_id }}" {{ old('estudiante_id', $ira->estudiante_id) == $estudiante->estudiante_id ? 'selected' : '' }}>
                                {{ $estudiante->nombre }}
                            </option>
                        @endforeach
                </select>
                @error('estudiante_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Era -->
            <div class="mb-4">
                <label for="era_id" class="block font-bold">Era</label>
                <select id="era_id" name="era_id" class="w-full border p-2 rounded" required>
                    <option value="">Selecciona una era</option>
                    @foreach($eras as $era)
                        <option value="{{ $era->era_id }}" {{ old('era_id', $ira->era_id) == $era->era_id ? 'selected' : '' }}>
                            {{ $era->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('era_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('iras.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>