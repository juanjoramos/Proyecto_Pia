<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Departamento;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        return view('docentes.index', [
            'docentes' => Docente::all()
        ]);
    }

    public function create()
    {
        $departamentos = Departamento::all();
        return view('docentes.create', compact('departamentos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'documento' => 'required|string|unique:docentes,documento',
            'correo' => 'required|email|unique:docentes,correo',
            'telefono' => 'nullable|string|max:20',
            'departamento_id' => 'required|exists:departamentos,departamento_id'
        ]);

        Docente::create($validated);

        return redirect()->route('docentes.index');
    }

    public function edit(Docente $docente)
    {
        $departamentos = Departamento::all();
        return view('docentes.edit', compact('docente', 'departamentos'));
    }

    public function update(Request $request, Docente $docente)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'documento' => 'required|string|unique:docentes,documento,' . $docente->docente_id . ',docente_id',
            'correo' => 'required|email|unique:docentes,correo,' . $docente->docente_id . ',docente_id',
            'telefono' => 'nullable|string|max:20',
            'departamento_id' => 'required|exists:departamentos,departamento_id'
        ]);

        $docente->update($validated);

        return redirect()->route('docentes.index');
    }

    public function destroy(Docente $docente)
    {
        $docente->delete();

        return redirect()->route('docentes.index');
    }
}
