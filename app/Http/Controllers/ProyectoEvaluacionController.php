<?php

namespace App\Http\Controllers;

use App\Models\ProyectoEvaluacion;
use App\Models\Proyecto;
use App\Models\Evaluacion;  // Asegúrate de importar el modelo Evaluacion
use App\Models\Evaluador;
use Illuminate\Http\Request;

class ProyectoEvaluacionController extends Controller
{
    public function index()
    {
        $proyectoEvaluaciones = ProyectoEvaluacion::with(['proyecto', 'evaluacion', 'evaluador'])->get();
        return view('proyecto_evaluaciones.index', compact('proyectoEvaluaciones'));
    }

public function edit($id)
{
    $proyectoEvaluacion = ProyectoEvaluacion::findOrFail($id);
    $proyectos = Proyecto::all();
    $evaluaciones = Evaluacion::all();
    $evaluadores = Evaluador::all();

    return view('proyecto_evaluaciones.edit', compact('proyectoEvaluacion', 'proyectos', 'evaluaciones', 'evaluadores'));
}



    public function create()
    {
        // Asegúrate de que estos datos estén siendo enviados a la vista
        $proyectos = Proyecto::all(); // Traer todos los proyectos
        $criterios = Evaluacion::all(); // Traer todas las evaluaciones (criterios)
        $evaluadores = Evaluador::all(); // Traer todos los evaluadores

        return view('proyecto_evaluaciones.create', compact('proyectos', 'criterios', 'evaluadores'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',  // Verifica que 'id' sea la clave primaria de proyectos
            'evaluacion_id' => 'required|exists:evaluaciones,id',  // Verifica que 'id' sea la clave primaria de evaluaciones
            'evaluador_id' => 'required|exists:evaluadores,evaluador_id',  // Usar 'evaluador_id' en lugar de 'id'
            'resultados_criterios' => 'required|string|max:1000',
        ]);

        // Si pasa la validación, crear el registro
        ProyectoEvaluacion::create($validated);

        // Redirigir al listado de evaluaciones con mensaje de éxito
        return redirect()->route('proyecto_evaluaciones.index')->with('success', 'Evaluación de proyecto registrada correctamente.');
    }

    public function update(Request $request, $id)
{
    // Buscar la evaluación del proyecto por ID
    $proyectoEvaluacion = ProyectoEvaluacion::findOrFail($id);

    // Validar los datos del formulario
    $validated = $request->validate([
        'proyecto_id' => 'required|exists:proyectos,id',
        'evaluacion_id' => 'required|exists:evaluaciones,id',
        'evaluador_id' => 'required|exists:evaluadores,evaluador_id',
        'resultados_criterios' => 'required|string|max:1000',
    ]);

    // Actualizar los datos del proyectoEvaluacion
    $proyectoEvaluacion->update($validated);

    // Redirigir con mensaje de éxito
    return redirect()->route('proyecto_evaluaciones.index')->with('success', 'Evaluación de proyecto actualizada correctamente.');
}

public function destroy($id)
{
    $proyectoEvaluacion = ProyectoEvaluacion::findOrFail($id);
    $proyectoEvaluacion->delete();

    return redirect()->route('proyecto_evaluaciones.index')
                     ->with('success', 'ProyectoEvaluación eliminado correctamente.');
}


}
