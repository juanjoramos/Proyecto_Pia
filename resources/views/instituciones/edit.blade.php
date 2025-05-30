    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Institución</h2>
        </x-slot>

        <div class="py-12 px-6">
            <form action="{{ route('instituciones.update', $institucion) }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-xl">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-bold">Nombre</label>
                    <input type="text" name="nombre" value="{{ old('nombre', $institucion->nombre) }}" class="w-full border p-2 rounded" required>
                    @error('nombre')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-bold">Sigla</label>
                    <input type="text" name="sigla" value="{{ old('sigla', $institucion->sigla) }}" class="w-full border p-2 rounded" required>
                    @error('sigla')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-bold mb-1">Tipo</label>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="radio" name="tipo" value="Pública"
                                {{ old('tipo', $institucion->tipo) == 'Pública' ? 'checked' : '' }}
                                class="form-radio text-blue-600">
                            <span class="ml-2">Pública</span>
                        </label>

                        <label class="flex items-center">
                            <input type="radio" name="tipo" value="Privada"
                                {{ old('tipo', $institucion->tipo) == 'Privada' ? 'checked' : '' }}
                                class="form-radio text-blue-600">
                            <span class="ml-2">Privada</span>
                        </label>
                    </div>
                    @error('tipo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-bold">Descripción</label>
                    <textarea name="descripcion" class="w-full border p-2 rounded" rows="3">{{ old('descripcion', $institucion->descripcion) }}</textarea>
                    @error('descripcion')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
                <a href="{{ route('instituciones.index') }}" class="ml-4 text-gray-700">Cancelar</a>
            </form>
        </div>
    </x-app-layout>
