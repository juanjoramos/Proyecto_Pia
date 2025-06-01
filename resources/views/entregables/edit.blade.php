<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Editar Entregable</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    <div class="py-12 px-6 flex justify-center bg-gray-900">
        <form action="{{ route('entregables.update', $entregable) }}" method="POST"
              class="bg-gray-800 w-full max-w-2xl p-8 rounded-2xl shadow-lg text-white">
            @csrf
            @method('PUT')

            <h3 class="text-2xl font-bold mb-6 border-b border-gray-700 pb-2">Editar Entregable</h3>

            {{-- Nombre --}}
            <div class="mb-5">
                <label for="nombre" class="block mb-2 font-semibold">Nombre</label>
                <input id="nombre" type="text" name="nombre" value="{{ old('nombre', $entregable->nombre) }}"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       required>
                @error('nombre')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Descripción --}}
            <div class="mb-5">
                <label for="descripcion" class="block mb-2 font-semibold">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4"
                          class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('descripcion', $entregable->descripcion) }}</textarea>
                @error('descripcion')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Fecha de Entrega --}}
            <div class="mb-5">
                <label for="fecha_entrega" class="block mb-2 font-semibold">Fecha de Entrega</label>
                <input id="fecha_entrega" type="date" name="fecha_entrega"
                       value="{{ old('fecha_entrega', $entregable->fecha_entrega ? $entregable->fecha_entrega->format('Y-m-d') : '') }}"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       required>
                @error('fecha_entrega')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Proyecto --}}
            <div class="mb-5">
                <label for="proyecto_id" class="block mb-2 font-semibold">Proyecto</label>
                <select id="proyecto_id" name="proyecto_id"
                        class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                    <option value="">Selecciona un proyecto</option>
                    @foreach($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}" {{ old('proyecto_id', $entregable->proyecto_id) == $proyecto->id ? 'selected' : '' }}>
                            {{ $proyecto->titulo }}
                        </option>
                    @endforeach
                </select>
                @error('proyecto_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tipo de Entregable --}}
            <div class="mb-6">
                <label for="tipo_entregable_id" class="block mb-2 font-semibold">Tipo de Entregable</label>
                <select id="tipo_entregable_id" name="tipo_entregable_id"
                        class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                    <option value="">Selecciona un tipo</option>
                    @foreach($tiposEntregable as $tipo)
                        <option value="{{ $tipo->tipo_entregable_id }}" {{ old('tipo_entregable_id', $entregable->tipo_entregable_id) == $tipo->tipo_entregable_id ? 'selected' : '' }}>
                            {{ $tipo->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('tipo_entregable_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('entregables.index') }}"
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