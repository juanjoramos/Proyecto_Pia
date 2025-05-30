<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuevo Docente</h2>

        <a href="{{ route('dashboard') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('docentes.store') }}" method="POST"
              class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf

            <div class="mb-4">
                <label class="block font-bold">Nombres</label>
                <input type="text" name="nombres" class="w-full border p-2 rounded" required value="{{ old('nombres') }}">
                @error('nombres')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Documento</label>
                <input type="text" name="documento" class="w-full border p-2 rounded" required value="{{ old('documento') }}">
                @error('documento')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Correo</label>
                <input type="email" name="correo" class="w-full border p-2 rounded" required value="{{ old('correo') }}">
                @error('correo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Teléfono</label>
                <input type="text" name="telefono" class="w-full border p-2 rounded" value="{{ old('telefono') }}">
                @error('telefono')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Departamento</label>
                <select name="departamento_id" class="w-full border p-2 rounded" required>
                    <option value="">Seleccione un departamento</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->departamento_id }}" {{ old('departamento_id') == $departamento->departamento_id ? 'selected' : '' }}>
                                {{ $departamento->nombre }}
                            </option>
                        @endforeach
                </select>
                @error('departamento_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('docentes.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>