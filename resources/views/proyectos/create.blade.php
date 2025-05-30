<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuevo Proyecto</h2>
        
        <a href="{{ route('dashboard') }}"
            class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 mb-4">
            ← Volver al Menú Principal
        </a>
    </x-slot>

    <div class="py-12 px-6">
        <form action="{{ route('proyectos.store') }}" method="POST" 
                class="bg-white p-6 rounded shadow-md max-w-xl">
            @csrf

            <div class="mb-4">
                <label class="block font-bold">Título</label>
                <input type="text" name="titulo" class="w-full border p-2 rounded" required>
                @error('titulo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Resumen</label>
                <textarea name="resumen" class="w-full border p-2 rounded" rows="3"></textarea>
                @error('resumen')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Fecha de Inicio</label>
                <input type="date" name="fecha_inicio" class="w-full border p-2 rounded" required>
                @error('fecha_inicio')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Fecha de Fin</label>
                <input type="date" name="fecha_fin" class="w-full border p-2 rounded">
                @error('fecha_fin')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-2">Estado</label>

                <div class="flex items-center space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="estado" value="Activo" class="form-radio text-blue-600" required>
                        <span class="ml-2">Activo</span>
                    </label>

                    <label class="inline-flex items-center">
                        <input type="radio" name="estado" value="Finalizado" class="form-radio text-green-600">
                        <span class="ml-2">Finalizado</span>
                    </label>

                    <label class="inline-flex items-center">
                        <input type="radio" name="estado" value="Suspendido" class="form-radio text-red-600">
                        <span class="ml-2">Suspendido</span>
                    </label>
                </div>

                @error('estado')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-bold">Tipo de Proyecto</label>
                <select name="id_tipo_proyecto" class="w-full border p-2 rounded" required>
                    <option value="">Seleccione un tipo</option>
                    @foreach($tiposProyecto as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                    @endforeach
                </select>
                @error('id_tipo_proyecto')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('proyectos.index') }}" class="ml-4 text-gray-700">Cancelar</a>
        </form>
    </div>
</x-app-layout>
