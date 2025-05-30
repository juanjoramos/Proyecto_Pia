<?php

namespace App\Http\Controllers;

use App\Models\TipoEntregable;
use Illuminate\Http\Request;

class TipoEntregableController extends Controller
{
    public function index()
    {
        $tipoEntregables = TipoEntregable::all();
        return view('tipo_entregables.index', compact('tipoEntregables'));
    }

    public function create()
    {
        return view('tipo_entregables.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
        ]);

        TipoEntregable::create($request->only('nombre', 'descripcion'));

        return redirect()->route('tipo_entregables.index')->with('success', 'Tipo de entregable creado exitosamente.');
    }

    public function edit(TipoEntregable $tipo_entregable)
    {
        return view('tipo_entregables.edit', ['tipoEntregable' => $tipo_entregable]);
    }


    public function update(Request $request, TipoEntregable $tipo_entregable)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
        ]);

        $tipo_entregable->update($request->only('nombre', 'descripcion'));

        return redirect()->route('tipo_entregables.index')->with('success', 'Tipo de entregable actualizado exitosamente.');
    }

    public function destroy(TipoEntregable $tipo_entregable)
    {
        $tipo_entregable->delete();

        return redirect()->route('tipo_entregables.index')->with('success', 'Tipo de entregable eliminado exitosamente.');
    }
}