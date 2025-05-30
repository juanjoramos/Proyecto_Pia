<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Proyecto;
use App\Models\DocenteProyecto;
use Illuminate\Http\Request;

class DocenteProyectoController extends Controller
{
    public function index()
    {
        $docenteProyectos = DocenteProyecto::with(['docente', 'proyecto'])->get();
        return view('docente_proyectos.index', compact('docenteProyectos'));
    }

    public function create()
    {
        $docentes = Docente::all();
        $proyectos = Proyecto::all();
        return view('docente_proyectos.create', compact('docentes', 'proyectos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'docente_id' => 'required|exists:docentes,docente_id',
            'proyecto_id' => 'required|exists:proyectos,id',
        ]);

        DocenteProyecto::create($request->only(['docente_id', 'proyecto_id']));

        return redirect()->route('docente_proyectos.index')->with('success', 'Asignación creada exitosamente.');
    }

    public function edit(DocenteProyecto $docenteProyecto)
    {
        $docentes = Docente::all();
        $proyectos = Proyecto::all();
        return view('docente_proyectos.edit', compact('docenteProyecto', 'docentes', 'proyectos'));
    }

    public function update(Request $request, DocenteProyecto $docenteProyecto)
    {
        $request->validate([
            'docente_id' => 'required|exists:docentes,docente_id',
            'proyecto_id' => 'required|exists:proyectos,id',
        ]);

        $docenteProyecto->update($request->only(['docente_id', 'proyecto_id']));

        return redirect()->route('docente_proyectos.index')->with('success', 'Asignación actualizada exitosamente.');
    }

    public function destroy(DocenteProyecto $docenteProyecto)
    {
        $docenteProyecto->delete();

        return redirect()->route('docente_proyectos.index')
                         ->with('success', 'Asignación eliminada exitosamente.');
    }
}
