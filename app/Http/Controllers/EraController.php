<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Era;
use App\Models\Evaluacion;

class EraController extends Controller
{
    public function index()
    {
        // Carga las eras con su relación evaluacion para mostrar datos relacionados
        $eras = Era::with('evaluacion')->get();
        return view('eras.index', compact('eras'));
    }

    public function create()
    {
        // Envía todas las evaluaciones para mostrar en el select
        $evaluaciones = Evaluacion::all();
        return view('eras.create', compact('evaluaciones'));
    }

    public function store(Request $request)
    {
        // Validar datos recibidos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'evaluacion_id' => 'required|exists:evaluaciones,id',
        ]);

        // Crear nueva era con los datos validados
        Era::create($request->only(['nombre', 'descripcion', 'evaluacion_id']));

        // Redireccionar con mensaje de éxito
        return redirect()->route('eras.index')->with('success', 'Era creada exitosamente.');
    }

    public function edit(Era $era)
    {
        // Obtener todas las evaluaciones para el select y pasar la era para editar
        $evaluaciones = Evaluacion::all();
        return view('eras.edit', compact('era', 'evaluaciones'));
    }

    public function update(Request $request, Era $era)
    {
        // Validar datos para actualizar
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'evaluacion_id' => 'required|exists:evaluaciones,id',
        ]);

        // Actualizar era con los datos validados
        $era->update($request->only(['nombre', 'descripcion', 'evaluacion_id']));

        // Redireccionar con mensaje de éxito
        return redirect()->route('eras.index')->with('success', 'Era actualizada exitosamente.');
    }

    public function destroy(Era $era)
    {
        // Eliminar la era
        $era->delete();

        // Redireccionar con mensaje de éxito
        return redirect()->route('eras.index')->with('success', 'Era eliminada exitosamente.');
    }
}