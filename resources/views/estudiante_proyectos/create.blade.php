<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Asignar Estudiante a Proyecto</h2>

        <a href="{{ route('dashboard') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('estudiante_proyectos.store') }}" method="POST"
              class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf

            <!-- Estudiante -->
            <div class="mb-4">
                <label class="block font-bold">Estudiante</label>
                <select name="estudiante_id" class="w-full border p-2 rounded" required>
                    <option value="">-- Selecciona un estudiante --</option>
                    @foreach ($estudiantes as $estudiante)
                        <option value="{{ $estudiante->estudiante_id }}"
                            {{ old('estudiante_id') == $estudiante->estudiante_id ? 'selected' : '' }}>
                            {{ $estudiante->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('estudiante_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Proyecto -->
            <div class="mb-4">
                <label class="block font-bold">Proyecto</label>
<select name="proyecto_id" required>
    <option value="">Selecciona un proyecto</option>
    @foreach ($proyectos as $proyecto)
        <option value="{{ $proyecto->id }}" {{ old('proyecto_id') == $proyecto->id ? 'selected' : '' }}>
            {{ $proyecto->titulo }}
        </option>
    @endforeach
</select>

                @error('proyecto_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Asignar</button>
            <a href="{{ route('estudiante_proyectos.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
