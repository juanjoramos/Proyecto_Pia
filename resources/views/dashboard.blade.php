<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-gray-100">
                ¡Bienvenido, <span class="text-blue-600 dark:text-blue-400">{{ Auth::user()->name }}</span>!
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow-xl rounded-xl p-10">
                <h3 class="text-4xl font-extrabold text-center text-gray-900 dark:text-white mb-10 border-b border-gray-300 dark:border-gray-700 pb-6">
                    Menú de Opciones
                </h3>

                @php
                    $menus = [
                        ['Asignaturas', 'asignaturas.index', 'bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-700 dark:hover:bg-indigo-800'],
                        ['Departamentos', 'departamentos.index', 'bg-green-600 hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-800'],
                        ['Docentes', 'docentes.index', 'bg-purple-600 hover:bg-purple-700 dark:bg-purple-700 dark:hover:bg-purple-800'],
                        ['Docente Proyectos', 'docente_proyectos.index', 'bg-yellow-500 hover:bg-yellow-600 dark:bg-yellow-600 dark:hover:bg-yellow-700'],
                        ['Entregables', 'entregables.index', 'bg-pink-600 hover:bg-pink-700 dark:bg-pink-700 dark:hover:bg-pink-800'],
                        ['Era', 'eras.index', 'bg-indigo-500 hover:bg-indigo-600 dark:bg-indigo-600 dark:hover:bg-indigo-700'],
                        ['Estudiantes', 'estudiantes.index', 'bg-teal-600 hover:bg-teal-700 dark:bg-teal-700 dark:hover:bg-teal-800'],
                        ['Estudiante Proyectos', 'estudiante_proyectos.index', 'bg-rose-600 hover:bg-rose-700 dark:bg-rose-700 dark:hover:bg-rose-800'],
                        ['Evaluaciones', 'evaluaciones.index', 'bg-red-600 hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800'],
                        ['Evaluadores', 'evaluadores.index', 'bg-orange-600 hover:bg-orange-700 dark:bg-orange-700 dark:hover:bg-orange-800'],
                        ['Facultades', 'facultades.index', 'bg-lime-600 hover:bg-lime-700 dark:bg-lime-700 dark:hover:bg-lime-800'],
                        ['Instituciones', 'instituciones.index', 'bg-sky-600 hover:bg-sky-700 dark:bg-sky-700 dark:hover:bg-sky-800'],
                        ['Ira', 'iras.index', 'bg-amber-600 hover:bg-amber-700 dark:bg-amber-700 dark:hover:bg-amber-800'],
                        ['Programas', 'programas.index', 'bg-fuchsia-600 hover:bg-fuchsia-700 dark:bg-fuchsia-700 dark:hover:bg-fuchsia-800'],
                        ['Proyectos', 'proyectos.index', 'bg-cyan-600 hover:bg-cyan-700 dark:bg-cyan-700 dark:hover:bg-cyan-800'],
                        ['Proyecto Asignaturas', 'proyecto_asignaturas.index', 'bg-violet-600 hover:bg-violet-700 dark:bg-violet-700 dark:hover:bg-violet-800'],
                        ['Proyecto Evaluaciones', 'proyecto_evaluaciones.index', 'bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-700 dark:hover:bg-emerald-800'],
                        ['Tipos de Entregable', 'tipo_entregables.index', 'bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700'],
                        ['Tipos de Proyecto', 'tipo-proyectos.index', 'bg-red-500 hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-700'],
                    ];
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($menus as [$label, $route, $colorClass])
                        <a href="{{ route($route) }}"
                           class="{{ $colorClass }} text-white px-8 py-6 rounded-2xl shadow-lg flex items-center gap-5 transition-transform transform hover:scale-[1.08] select-none">
                            <svg class="w-8 h-8 stroke-current" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-xl font-semibold">{{ $label }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>