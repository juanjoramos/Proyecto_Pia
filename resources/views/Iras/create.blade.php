<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuevo IRA</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('iras.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf

            <!-- Valor -->
            <div class="mb-4">
                <label class="block font-bold">Valor</label>
                <input id="valor" type="number" step="1" name="valor" value="{{ old('valor', intval($ira->valor)) }}" class="w-full border p-2 rounded" required>
                @error('valor')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Observaciones -->
            <div class="mb-4">
                <label class="block font-bold">Observaciones</label>
                <textarea name="observaciones" rows="3" class="w-full border p-2 rounded">{{ old('observaciones') }}</textarea>
                @error('observaciones')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Estudiante -->
            <div class="mb-4">
                <label class="block font-bold">Estudiante</label>
                <select name="estudiante_id" class="w-full border p-2 rounded" required>
                    <option value="">Selecciona un estudiante</option>
                    @foreach($estudiantes as $estudiante)
                        <option value="{{ $estudiante->estudiante_id }}" {{ old('estudiante_id') == $estudiante->estudiante_id ? 'selected' : '' }}>
                            {{ $estudiante->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('estudiante_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Era -->
            <div class="mb-4">
                <label class="block font-bold">Era</label>
                <select name="era_id" class="w-full border p-2 rounded" required>
                    <option value="">Selecciona una era</option>
                    @foreach($eras as $era)
                        <option value="{{ $era->era_id }}" {{ old('era_id') == $era->era_id ? 'selected' : '' }}>
                            {{ $era->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('era_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('iras.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>