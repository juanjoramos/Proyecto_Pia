<?php

namespace App\Http\Controllers;

use App\Models\Evaluador;
use App\Models\Departamento;
use Illuminate\Http\Request;

class EvaluadorController extends Controller
{
    public function index()
    {
        $evaluadores = Evaluador::with('departamento')->get();
        return view('evaluadores.index', compact('evaluadores'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
        return view('evaluadores.create', compact('departamentos'));
    }

    public function store(Request $request)
    {
$validated = $request->validate([
    'nombres' => 'required|string|max:255',
    'apellidos' => 'required|string|max:255',
    'correo' => 'required|email|unique:evaluadores',
    'telefono' => 'nullable|string|max:20',
    'departamento_id' => 'nullable|exists:departamentos,departamento_id',
]);


        Evaluador::create($validated);

        return redirect()->route('evaluadores.index');
    }

    public function edit(Evaluador $evaluador)
    {
        $departamentos = Departamento::all();
        return view('evaluadores.edit', compact('evaluador', 'departamentos'));
    }

    public function update(Request $request, Evaluador $evaluador)
    {
$validated = $request->validate([
    'nombres' => 'required|string|max:255',
    'apellidos' => 'required|string|max:255',
    'correo' => 'required|email|unique:evaluadores,correo,' . $evaluador->evaluador_id . ',evaluador_id',
    'telefono' => 'nullable|string|max:20',
    'departamento_id' => 'nullable|exists:departamentos,departamento_id',
]);


        $evaluador->update($validated);

        return redirect()->route('evaluadores.index');
    }

public function destroy(Evaluador $evaluador)
{
    $evaluador->delete();
    return redirect()->route('evaluadores.index');
}

}