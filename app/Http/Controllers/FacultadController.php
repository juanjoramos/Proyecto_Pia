<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use App\Models\Institucion;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    public function index()
    {
        $facultades = Facultad::with('institucion')->get();
        return view('facultades.index', compact('facultades'));
    }

    public function create()
    {
        $instituciones = Institucion::all();
        return view('facultades.create', compact('instituciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'institucion_id' => 'required|exists:instituciones,id',
        ]);

        Facultad::create([
            'nombre' => $request->nombre,
            'institucion_id' => $request->institucion_id,
        ]);

        return redirect()->route('facultades.index')->with('success', 'Facultad creada exitosamente.');
    }

    public function edit(Facultad $facultad)
    {
        $instituciones = Institucion::all();
        return view('facultades.edit', compact('facultad', 'instituciones'));
    }

    public function update(Request $request, Facultad $facultad)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'institucion_id' => 'required|exists:instituciones,id',
        ]);

        $facultad->update([
            'nombre' => $request->nombre,
            'institucion_id' => $request->institucion_id,
        ]);

        return redirect()->route('facultades.index')->with('success', 'Facultad actualizada exitosamente.');
    }

    public function destroy(Facultad $facultad)
    {
        $facultad->delete();

        return redirect()->route('facultades.index')
                         ->with('success', 'Facultad eliminada exitosamente.');
    }
}