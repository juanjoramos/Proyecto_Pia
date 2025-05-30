<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    public function index()
    {
        $instituciones = Institucion::all();
        return view('instituciones.index', compact('instituciones'));
    }

    public function create()
    {
        return view('instituciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'sigla' => 'nullable|string|max:20',
            'tipo' => 'nullable|string|max:50',
            'descripcion' => 'nullable|string|max:255',
        ]);

        Institucion::create($request->all());

        return redirect()->route('instituciones.index')->with('success', 'Institución creada exitosamente.');
    }

    public function edit(Institucion $institucion)
    {
        return view('instituciones.edit', compact('institucion'));
    }

    public function update(Request $request, Institucion $institucion)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'sigla' => 'nullable|string|max:20',
            'tipo' => 'nullable|string|max:50',
            'descripcion' => 'nullable|string|max:255',
        ]);

        $institucion->update($request->all());

        return redirect()->route('instituciones.index')->with('success', 'Institución actualizada exitosamente.');
    }

    public function destroy(Institucion $institucion)
    {
        $institucion->delete();

        return redirect()->route('instituciones.index')->with('success', 'Institución eliminada exitosamente.');
    }
}
