<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\TipoProyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        $tiposProyecto = TipoProyecto::all();
        return view('proyectos.create', compact('tiposProyecto'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'resumen' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'estado' => 'required|string|max:50',
            'id_tipo_proyecto' => 'required|exists:tipo_proyectos,id',
        ]);

        Proyecto::create($request->all());

        return redirect()->route('proyectos.index')
                         ->with('success', 'Proyecto creado exitosamente.');
    }

    public function edit(Proyecto $proyecto)
    {
        $tiposProyecto = TipoProyecto::all();
        return view('proyectos.edit', compact('proyecto', 'tiposProyecto'));
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'resumen' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'estado' => 'required|string|max:50',
            'id_tipo_proyecto' => 'required|exists:tipo_proyectos,id',
        ]);

        $proyecto->update($request->all());

        return redirect()->route('proyectos.index')
                         ->with('success', 'Proyecto actualizado exitosamente.');
    }

    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();

        return redirect()->route('proyectos.index')
                         ->with('success', 'Proyecto eliminado exitosamente.');
    }
}