<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Models\Departamento;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    public function index()
    {
        // Traemos programas con su departamento relacionado
        $programas = Programa::with('departamento')->get();
        return view('programas.index', compact('programas'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
        return view('programas.create', compact('departamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:50|unique:programas,codigo',
            'departamento_id' => 'required|exists:departamentos,departamento_id',
        ]);

        Programa::create($request->only('nombre', 'codigo', 'departamento_id'));

        return redirect()->route('programas.index')->with('success', 'Programa creado exitosamente.');
    }

    // Route Model Binding con clave primaria 'programa_id'
    public function edit(Programa $programa)
    {
        $departamentos = Departamento::all();
        return view('programas.edit', compact('programa', 'departamentos'));
    }

    public function update(Request $request, Programa $programa)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:50|unique:programas,codigo,' . $programa->programa_id . ',programa_id',
            'departamento_id' => 'required|exists:departamentos,departamento_id',
        ]);

        $programa->update($request->only('nombre', 'codigo', 'departamento_id'));

        return redirect()->route('programas.index')->with('success', 'Programa actualizado exitosamente.');
    }

    public function destroy(Programa $programa)
    {
        $programa->delete();

        return redirect()->route('programas.index')->with('success', 'Programa eliminado exitosamente.');
    }
}