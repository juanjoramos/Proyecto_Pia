<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Facultad;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        // Traemos departamentos con su facultad relacionada
        $departamentos = Departamento::with('facultad')->get();
        return view('departamentos.index', compact('departamentos'));
    }

    public function create()
    {
        $facultades = Facultad::all();
        return view('departamentos.create', compact('facultades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'facultad_id' => 'required|exists:facultades,facultad_id',
        ]);

        Departamento::create($request->only('nombre', 'facultad_id'));

        return redirect()->route('departamentos.index')->with('success', 'Departamento creado exitosamente.');
    }

    // Aquí usa Route Model Binding con la clave primaria correcta
    public function edit(Departamento $departamento)
    {
        $facultades = Facultad::all();
        return view('departamentos.edit', compact('departamento', 'facultades'));
    }

    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'facultad_id' => 'required|exists:facultades,facultad_id',
        ]);

        $departamento->update($request->only('nombre', 'facultad_id'));

        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado exitosamente.');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();

        return redirect()->route('departamentos.index')->with('success', 'Departamento eliminado exitosamente.');
    }
}