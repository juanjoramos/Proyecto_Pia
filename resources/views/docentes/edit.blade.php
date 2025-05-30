<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Docente</h2>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('docentes.update', $docente) }}" method="POST"
              class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">Nombres</label>
                <input type="text" name="nombres" value="{{ old('nombres', $docente->nombres) }}"
                       class="w-full border p-2 rounded" required>
                @error('nombres')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Documento</label>
                <input type="text" name="documento" value="{{ old('documento', $docente->documento) }}"
                       class="w-full border p-2 rounded" required>
                @error('documento')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Correo</label>
                <input type="email" name="correo" value="{{ old('correo', $docente->correo) }}"
                       class="w-full border p-2 rounded" required>
                @error('correo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Teléfono</label>
                <input type="text" name="telefono" value="{{ old('telefono', $docente->telefono) }}"
                       class="w-full border p-2 rounded">
                @error('telefono')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Departamento</label>
                <select name="departamento_id" class="w-full border p-2 rounded" required>
                    <option value="">Seleccione un departamento</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->departamento_id }}"
                            {{ old('departamento_id', $docente->departamento_id) == $departamento->departamento_id ? 'selected' : '' }}>
                            {{ $departamento->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('departamento_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('docentes.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>