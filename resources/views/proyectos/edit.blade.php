<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Editar Proyecto</h2>
            <a href="{{ route('dashboard') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                ← Volver al Menú Principal
            </a>
        </div>
    </x-slot>

    {{-- Quitamos min-h-screen para que el fondo no se extienda más allá de los botones --}}
    <div class="py-12 px-6 flex justify-center bg-gray-900">
        <form action="{{ route('proyectos.update', $proyecto) }}" method="POST"
              class="bg-gray-800 w-full max-w-2xl p-8 rounded-2xl shadow-lg text-white">
            @csrf
            @method('PUT')

            <h3 class="text-2xl font-bold mb-6 border-b border-gray-700 pb-2">Editar Proyecto</h3>

            {{-- Título --}}
            <div class="mb-5">
                <label class="block mb-2 font-semibold">Título</label>
                <input type="text" name="titulo"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       value="{{ old('titulo', $proyecto->titulo) }}" required>
                @error('titulo')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Resumen --}}
            <div class="mb-5">
                <label class="block mb-2 font-semibold">Resumen</label>
                <textarea name="resumen"
                          class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                          rows="3">{{ old('resumen', $proyecto->resumen) }}</textarea>
                @error('resumen')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Fecha de Inicio --}}
            <div class="mb-5">
                <label class="block mb-2 font-semibold">Fecha de Inicio</label>
                <input type="date" name="fecha_inicio"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       value="{{ old('fecha_inicio', $proyecto->fecha_inicio ? $proyecto->fecha_inicio->format('Y-m-d') : '') }}" required>
                @error('fecha_inicio')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Fecha de Fin --}}
            <div class="mb-5">
                <label class="block mb-2 font-semibold">Fecha de Fin</label>
                <input type="date" name="fecha_fin"
                       class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-white"
                       value="{{ old('fecha_fin', $proyecto->fecha_fin ? $proyecto->fecha_fin->format('Y-m-d') : '') }}">
                @error('fecha_fin')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Estado --}}
            <div class="mb-6">
                <label class="block mb-2 font-semibold">Estado</label>

                <div class="flex items-center space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="estado" value="Activo"
                               {{ old('estado', $proyecto->estado) === 'Activo' ? 'checked' : '' }}
                               class="form-radio text-blue-600" required>
                        <span class="ml-2">Activo</span>
                    </label>

                    <label class="inline-flex items-center">
                        <input type="radio" name="estado" value="Finalizado"
                               {{ old('estado', $proyecto->estado) === 'Finalizado' ? 'checked' : '' }}
                               class="form-radio text-green-600">
                        <span class="ml-2">Finalizado</span>
                    </label>

                    <label class="inline-flex items-center">
                        <input type="radio" name="estado" value="Suspendido"
                               {{ old('estado', $proyecto->estado) === 'Suspendido' ? 'checked' : '' }}
                               class="form-radio text-red-600">
                        <span class="ml-2">Suspendido</span>
                    </label>
                </div>

                @error('estado')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tipo de Proyecto --}}
            <div class="mb-6">
                <label class="block mb-2 font-semibold">Tipo de Proyecto</label>
                <select name="id_tipo_proyecto"
                        class="w-full bg-gray-700 border border-gray-600 px-4 py-2 rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                    <option value="">-- Seleccione --</option>
                    @foreach ($tiposProyecto as $tipo)
                        <option value="{{ $tipo->id }}" {{ old('id_tipo_proyecto', $proyecto->id_tipo_proyecto) == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->descripcion }}
                        </option>
                    @endforeach
                </select>
                @error('id_tipo_proyecto')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('proyectos.index') }}"
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