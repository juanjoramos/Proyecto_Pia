<?php

use App\Http\Controllers\TipoProyectoController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EstudianteProyectoController;
use App\Http\Controllers\DocenteProyectoController;
use App\Http\Controllers\EvaluadorController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\EraController;
use App\Http\Controllers\ProyectoAsignaturaController;
use App\Http\Controllers\ProyectoEvaluacionController;
use App\Http\Controllers\TipoEntregableController;
use App\Http\Controllers\EntregableController;
use App\Http\Controllers\IraController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /**
     * Todas las opciones del Menú
     */
    Route::resource('tipo-proyectos', TipoProyectoController::class);
    Route::resource('asignaturas', AsignaturaController::class);
    Route::resource('proyectos', ProyectoController::class);

    Route::resource('instituciones', InstitucionController::class)->parameters([
        'instituciones' => 'institucion'
    ]);

    Route::resource('facultades', FacultadController::class)->parameters([
        'facultades' => 'facultad'
    ]);

    Route::resource('departamentos', DepartamentoController::class)->parameters([
        'departamentos' => 'departamento',
    ]);

    Route::resource('programas', ProgramaController::class);
    Route::resource('docentes', DocenteController::class);
    Route::resource('estudiantes', EstudianteController::class);

    Route::resource('estudiante_proyectos', EstudianteProyectoController::class)->parameters([
        'estudiante_proyectos' => 'estudiante_proyecto'
    ]);

    Route::resource('docente_proyectos', DocenteProyectoController::class)->parameters([
        'docente_proyectos' => 'docente_proyecto'
    ]);

    Route::resource('evaluadores', EvaluadorController::class)->parameters([
        'evaluadores' => 'evaluador',
    ]);

    Route::resource('evaluaciones', EvaluacionController::class)->parameters([
        'evaluaciones' => 'evaluacion'
    ]);

    Route::resource('eras', EraController::class)->parameters([
        'eras' => 'era'
    ]);

    Route::resource('iras', IraController::class)->parameters([
        'iras' => 'ira'
    ]);

    Route::resource('entregables', EntregableController::class);
    Route::resource('tipo_entregables', TipoEntregableController::class);
    Route::resource('proyecto_asignaturas', ProyectoAsignaturaController::class)->parameters([
        'proyecto_asignaturas' => 'proyecto_asignatura'
    ]);
    Route::resource('proyecto_evaluaciones', ProyectoEvaluacionController::class);
});

require __DIR__.'/auth.php';
