<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Programa;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    public function index()
    {
        $asignaturas = Asignatura::with('programa')->get();
        return view('asignaturas.index', compact('asignaturas'));
    }

    public function create()
    {
        $programas = Programa::all();
        return view('asignaturas.create', compact('programas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:50|unique:asignaturas,codigo',
            'creditos' => 'required|integer|min:1',
            'programa_id' => 'required|exists:programas,programa_id',
        ]);

        Asignatura::create($request->only('nombre', 'codigo', 'creditos', 'programa_id'));

        return redirect()->route('asignaturas.index')->with('success', 'Asignatura creada exitosamente.');
    }

    public function edit(Asignatura $asignatura)
    {
        $programas = Programa::all();
        return view('asignaturas.edit', compact('asignatura', 'programas'));
    }

    public function update(Request $request, Asignatura $asignatura)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:50|unique:asignaturas,codigo,' . $asignatura->asignatura_id . ',asignatura_id',
            'creditos' => 'required|integer|min:1',
            'programa_id' => 'required|exists:programas,programa_id',
        ]);

        $asignatura->update($request->only('nombre', 'codigo', 'creditos', 'programa_id'));

        return redirect()->route('asignaturas.index')->with('success', 'Asignatura actualizada exitosamente.');
    }

    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();
        return redirect()->route('asignaturas.index')->with('success', 'Asignatura eliminada exitosamente.');
    }
}