<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 border-b pb-2 text-center">Menú de Opciones</h3>

                <ul class="space-y-3 text-lg">
                    <li>
                        <a href="{{ route('asignaturas.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Asignaturas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('departamentos.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Departamentos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('docentes.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Docentes
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('docente_proyectos.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Docente Proyectos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('entregables.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Entregables
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('eras.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Era
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('estudiantes.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Estudiantes
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('estudiante_proyectos.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Estudiante Proyectos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('evaluaciones.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Evaluaciones
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('evaluadores.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Evaluadores
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('facultades.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Facultades
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('instituciones.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Instituciones
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('iras.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Ira
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('programas.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Programas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('proyectos.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Proyectos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('proyecto_asignaturas.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Proyecto Asignaturas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('proyecto_evaluaciones.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Proyecto Evaluaciones
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tipo_entregables.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Tipos de Entregable
                        </a>
                    </li>   
                    <li>
                        <a href="{{ route('tipo-proyectos.index') }}" class="block text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Tipos de Proyecto
                        </a>
                    </li>                                                        
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
