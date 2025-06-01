<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Models\Facultad;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    public function index()
    {
        // Traemos programas con su facultad relacionada
        $programas = Programa::with('facultad')->get();
        return view('programas.index', compact('programas'));
    }

    public function create()
    {
        $facultades = Facultad::all();
        return view('programas.create', compact('facultades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:50|unique:programas,codigo',
            'facultad_id' => 'required|exists:facultades,facultad_id',
        ]);

        Programa::create($request->only('nombre', 'codigo', 'facultad_id'));

        return redirect()->route('programas.index')->with('success', 'Programa creado exitosamente.');
    }

    public function edit(Programa $programa)
    {
        $facultades = Facultad::all();
        return view('programas.edit', compact('programa', 'facultades'));
    }

    public function update(Request $request, Programa $programa)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:50|unique:programas,codigo,' . $programa->programa_id . ',programa_id',
            'facultad_id' => 'required|exists:facultades,facultad_id',
        ]);

        $programa->update($request->only('nombre', 'codigo', 'facultad_id'));

        return redirect()->route('programas.index')->with('success', 'Programa actualizado exitosamente.');
    }

    public function destroy(Programa $programa)
    {
        $programa->delete();

        return redirect()->route('programas.index')->with('success', 'Programa eliminado exitosamente.');
    }
}