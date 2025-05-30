<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nueva Asignatura</h2>

        <a href="{{ route('dashboard') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('asignaturas.store') }}" method="POST" 
              class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf

            <div class="mb-4">
                <label class="block font-bold">Nombre</label>
                <input type="text" name="nombre" class="w-full border p-2 rounded" required value="{{ old('nombre') }}">
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Código</label>
                <input type="text" name="codigo" class="w-full border p-2 rounded" required value="{{ old('codigo') }}">
                @error('codigo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Créditos</label>
                <input type="number" name="creditos" class="w-full border p-2 rounded" required min="1" value="{{ old('creditos') }}">
                @error('creditos')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Programa</label>
                <select name="programa_id" class="w-full border p-2 rounded" required>
                    <option value="">-- Seleccione un programa --</option>
                    @foreach ($programas as $programa)
                        <option value="{{ $programa->programa_id }}" 
                            {{ old('programa_id') == $programa->programa_id ? 'selected' : '' }}>
                            {{ $programa->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('programa_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('asignaturas.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>