<?php

namespace App\Http\Controllers;

use App\Models\Entregable;
use App\Models\Proyecto;
use App\Models\TipoEntregable;
use Illuminate\Http\Request;

class EntregableController extends Controller
{
    public function index()
    {
        $entregables = Entregable::with(['proyecto', 'tipoEntregable'])->get();
        return view('entregables.index', compact('entregables'));
    }

    public function create()
    {
        $proyectos = Proyecto::all();
        $tiposEntregable = TipoEntregable::all();

        return view('entregables.create', compact('proyectos', 'tiposEntregable'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_entrega' => 'required|date',
            'proyecto_id' => 'required|exists:proyectos,id',
            'tipo_entregable_id' => 'required|exists:tipo_entregables,tipo_entregable_id',
        ]);

        Entregable::create($request->only('nombre', 'descripcion', 'fecha_entrega', 'proyecto_id', 'tipo_entregable_id'));

        return redirect()->route('entregables.index')->with('success', 'Entregable creado exitosamente.');
    }

    public function edit(Entregable $entregable)
    {
        $proyectos = Proyecto::all();
        $tiposEntregable = TipoEntregable::all();
        return view('entregables.edit', compact('entregable', 'proyectos', 'tiposEntregable'));
    }

    public function update(Request $request, Entregable $entregable)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_entrega' => 'required|date',
            'proyecto_id' => 'required|exists:proyectos,id',
            'tipo_entregable_id' => 'required|exists:tipo_entregables,tipo_entregable_id',
        ]);

        $entregable->update($request->only('nombre', 'descripcion', 'fecha_entrega', 'proyecto_id', 'tipo_entregable_id'));

        return redirect()->route('entregables.index')->with('success', 'Entregable actualizado exitosamente.');
    }

    public function destroy(Entregable $entregable)
    {
        $entregable->delete();
        return redirect()->route('entregables.index')->with('success', 'Entregable eliminado exitosamente.');
    }
}