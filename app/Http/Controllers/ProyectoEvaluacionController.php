<?php

namespace App\Http\Controllers;

use App\Models\ProyectoEvaluacion;
use App\Models\Proyecto;
use App\Models\Evaluacion;
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

        return view('proyecto_evaluaciones.edit', [
            'proyectoEvaluacion' => $proyectoEvaluacion,
            'proyectos' => Proyecto::all(),
            'evaluaciones' => Evaluacion::all(),
            'evaluadores' => Evaluador::all(),
        ]);
    }

    public function create()
    {
        $proyectos = Proyecto::all();
        $evaluadores = Evaluador::all();
        $criterios = Evaluacion::all();
        return view('proyecto_evaluaciones.create', compact('proyectos', 'evaluadores', 'criterios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'evaluacion_id' => 'required|exists:evaluaciones,id',
            'evaluador_id' => 'required|exists:evaluadores,id',
            'resultados_criterios' => 'required|string|max:1000',
        ]);

        ProyectoEvaluacion::create($validated);

        return redirect()->route('proyecto_evaluaciones.index')->with('success', 'Evaluación de proyecto registrada correctamente.');
    }


}