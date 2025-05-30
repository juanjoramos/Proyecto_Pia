<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    public function index() {
        return view('evaluaciones.index', ['evaluaciones' => Evaluacion::all()]);
    }

    public function create() {
        return view('evaluaciones.create');
    }

    public function store(Request $request) {
        Evaluacion::create($request->validate([
            'criterio' => 'required',
            'calificacion' => 'required|integer|min:0|max:5',
            'observaciones' => 'nullable'
        ]));
        return redirect()->route('evaluaciones.index');
    }

    public function edit(Evaluacion $evaluacion) {
        return view('evaluaciones.edit', compact('evaluacion'));
    }

    public function update(Request $request, Evaluacion $evaluacion) {
        $evaluacion->update($request->validate([
            'criterio' => 'required',
            'calificacion' => 'required|integer|min:0|max:5',
            'observaciones' => 'nullable'
        ]));
        return redirect()->route('evaluaciones.index');
    }

    public function destroy(Evaluacion $evaluacion) {
        $evaluacion->delete();
        return redirect()->route('evaluaciones.index');
    }
}