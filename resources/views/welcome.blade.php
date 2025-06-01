<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto PIA - Gestión de Proyectos de Aula</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Logo_1.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
</head>
<body class="font-sans antialiased bg-gray-900 text-white">
    <div class="min-h-screen flex flex-col justify-between">
        <header class="bg-gray-800 shadow-md">
            <div class="max-w-7xl mx-auto px-4 py-6 flex justify-between items-center">
                <h1 class="text-2xl font-bold">Proyecto PIA</h1>
                <nav class="space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-300 hover:text-white">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-300 hover:text-white">Iniciar sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-300 hover:text-white">Registrarse</a>
                        @endif
                    @endauth
                </nav>
            </div>
        </header>

        <main class="flex-grow">
            <section class="text-center py-16 px-4">
                <h2 class="text-4xl font-extrabold mb-4">Sistema de Gestión de Proyectos de Aula</h2>
                <p class="text-lg text-gray-300 max-w-3xl mx-auto">
                    Esta plataforma permite a estudiantes y docentes gestionar los proyectos académicos, realizar evaluaciones y mantener un seguimiento estructurado.
                </p>
            </section>

            <section class="grid md:grid-cols-2 gap-6 max-w-6xl mx-auto px-4 py-10">
                <div class="bg-gray-800 rounded-lg p-6 shadow hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold mb-2">Módulo de Proyectos</h3>
                    <p class="text-gray-400">Consulta, registra y edita proyectos desarrollados por los estudiantes, asignados a los docentes.</p>
                </div>
                <div class="bg-gray-800 rounded-lg p-6 shadow hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold mb-2">Evaluaciones</h3>
                    <p class="text-gray-400">Registra y visualiza evaluaciones realizadas por docentes o jurados externos.</p>
                </div>
                <div class="bg-gray-800 rounded-lg p-6 shadow hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold mb-2">Panel de Usuarios</h3>
                    <p class="text-gray-400">Módulo de autenticación, roles y permisos con seguridad basada en Spatie.</p>
                </div>
                <div class="bg-gray-800 rounded-lg p-6 shadow hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold mb-2">Documentación</h3>
                    <p class="text-gray-400">Guías de instalación, uso del sistema y enlaces útiles para el desarrollo y soporte del PIA.</p>
                </div>
            </section>

            <section class="text-center py-16 bg-gray-800">
    <h3 class="text-2xl font-semibold mb-6">Equipo de Desarrollo</h3>
    <div class="flex flex-wrap justify-center gap-6">
        <div class="flex flex-col items-center bg-gray-700 rounded-lg px-6 py-6 shadow w-72">
            <img src="/fotos/juan.jpg" alt="Juan José Ramos" class="rounded-full w-32 h-32 object-cover mb-4">
            <p class="font-semibold text-white text-lg">Juan José Ramos</p>
        </div>
        <div class="flex flex-col items-center bg-gray-700 rounded-lg px-6 py-6 shadow w-72">
            <img src="/fotos/ximena.jpg" alt="Ximena Zamudio" class="rounded-full w-32 h-32 object-cover mb-4">
            <p class="font-semibold text-white text-lg">Ximena Zamudio</p>
        </div>
        <div class="flex flex-col items-center bg-gray-700 rounded-lg px-6 py-6 shadow w-72">
            <img src="fotos/john.jpg" alt="Jairo Cañaveral" class="rounded-full w-32 h-32 object-cover mb-4">
            <p class="font-semibold text-white text-lg">Jairo Cañaveral</p>
        </div>
        <div class="flex flex-col items-center bg-gray-700 rounded-lg px-6 py-6 shadow w-72">
            <img src="/fotos/estiven.jpg" alt="Estiven Toro" class="rounded-full w-32 h-32 object-cover mb-4">
            <p class="font-semibold text-white text-lg">Estiven Toro</p>
        </div>
    </div>
</section>

        </main>

                    <footer class="bg-[#1f2937] border-t border-gray-600 text-white py-10 mt-6">
                    <div class="max-w-7xl mx-auto px-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-sm text-center">

                        <!-- CONTACTO -->
                        <div>
                            <h3 class="text-lg font-bold mb-4">CONTACTO</h3>
                            <p class="pb-2">John Cañaveral</p>
                            <p class="pb-2">john.canaveral921@pascualbravo.edu.co</p>
                            <p class="pb-2">Juan Jose Ramos</p>
                            <p class="pb-2">juan.ramos586@pascualbravo.edu.co</p>
                            <p class="pb-2">Ximena Zamudio</p>
                            <p class="pb-2">ximena.zamudio523@pascualbravo.edu.co</p>
                            <p class="pb-2">Estiven Toro Henao</p>
                            <p class="pb-2">estiven.toro046@pascualbravo.edu.co</p>
                        </div>

                        <!-- TELÉFONOS -->
                        <div>
                            <h3 class="text-lg font-bold mb-4">TELÉFONOS</h3>
                            <p class="pb-2">John Cañaveral: +57 300 532 44 11</p>
                            <p class="pb-2">Juan Jose Ramos: +57 312 778 80 47</p>
                            <p class="pb-2">Ximena Zamudio: +57 301 376 61 59</p>
                            <p class="pb-2">Estiven Toro Henao: +57 319 509 63 11</p>
                        </div>

                        <!-- GITHUB -->
                        <div>
                            <h3 class="text-lg font-bold mb-4">GITHUB</h3>
                            <p class="pb-2">
                            <a href="https://github.com/jairocanaveral23" target="_blank" rel="noopener noreferrer">Jairo Cañaveral</a>
                            </p>
                            <p class="pb-2">
                            <a href="https://github.com/juanjopg123" target="_blank" rel="noopener noreferrer">Juan José Ramos</a>
                            </p>
                            <p class="pb-2">
                            <a href="https://github.com/ximena-2301" target="_blank" rel="noopener noreferrer">Ximena Zamudio Mesa</a>
                            </p>
                            <p class="pb-2">
                            <a href="https://github.com/torotzl" target="_blank" rel="noopener noreferrer">Estiven Toro Henao</a>
                            </p>
                        </div>

                        </div>

                        <!-- Footer final -->
                        <div class="border-t border-gray-600 mt-10 pt-4 text-center text-xs text-gray-400">
                        <p>
                            Copyright ©2020 All rights reserved by:
                            <span class="text-blue-400 font-semibold">The Providers</span>
                        </p>
                        </div>
                    </div>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>