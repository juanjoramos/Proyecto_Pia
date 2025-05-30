<?php

namespace App\Http\Controllers;

use App\Models\ProyectoAsignatura;
use App\Models\Proyecto;
use App\Models\Asignatura;
use App\Models\Docente;
use Illuminate\Http\Request;

class ProyectoAsignaturaController extends Controller
{
    /**
     * Mostrar el listado de asignaciones proyecto-asignatura.
     */
    public function index()
    {
        // Traemos todas las asignaciones con sus relaciones para evitar N+1
        $proyectoAsignaturas = ProyectoAsignatura::with(['proyecto', 'asignatura', 'docente'])->get();

        return view('proyecto_asignaturas.index', compact('proyectoAsignaturas'));
    }

    /**
     * Mostrar el formulario para crear una nueva asignación.
     */
    public function create()
    {
        // Traemos todos los proyectos, asignaturas y docentes para el formulario
        $proyectos = Proyecto::all();
        $asignaturas = Asignatura::all();
        $docentes = Docente::all();

        return view('proyecto_asignaturas.create', compact('proyectos', 'asignaturas', 'docentes'));
    }

    /**
     * Almacenar una nueva asignación en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'asignatura_id' => 'required|exists:asignaturas,asignatura_id',
            'docente_id' => 'required|exists:docentes,docente_id',
            'grupo' => 'required|string|max:255', // Asegúrate de que el grupo no tenga más de 255 caracteres
        ]);

        // Creación de la asignación
        ProyectoAsignatura::create([
            'proyecto_id' => $request->proyecto_id,
            'asignatura_id' => $request->asignatura_id,
            'docente_id' => $request->docente_id,
            'grupo' => $request->grupo,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('proyecto_asignaturas.index')->with('success', 'Asignación creada correctamente.');
    }

    /**
     * Mostrar el formulario para editar una asignación existente.
     */
public function edit($proyecto_asignatura)
{
    $proyectoAsignatura = ProyectoAsignatura::findOrFail($proyecto_asignatura);
    $proyectos = Proyecto::all();
    $asignaturas = Asignatura::all();
    $docentes = Docente::all();

    return view('proyecto_asignaturas.edit', compact('proyectoAsignatura', 'proyectos', 'asignaturas', 'docentes'));
}

    /**
     * Actualizar una asignación existente.
     */
public function update(Request $request, $proyecto_asignatura)
{
    $proyectoAsignatura = ProyectoAsignatura::findOrFail($proyecto_asignatura);

    $validated = $request->validate([
        'proyecto_id' => 'required|exists:proyectos,id',
        'asignatura_id' => 'required|exists:asignaturas,asignatura_id',
        'docente_id' => 'required|exists:docentes,docente_id',
        'grupo' => 'required|string|max:255',
    ]);

    // Actualizar los datos
    $proyectoAsignatura->update($validated);

    return redirect()->route('proyecto_asignaturas.index')->with('success', 'Proyecto Asignatura actualizado correctamente.');
}


    /**
     * Eliminar una asignación.
     */
    public function destroy($id)
    {
        // Buscar la asignación por ID y eliminarla
        $proyectoAsignatura = ProyectoAsignatura::findOrFail($id);
        $proyectoAsignatura->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('proyecto_asignaturas.index')
                         ->with('success', 'Asignación eliminada correctamente.');
    }
}
