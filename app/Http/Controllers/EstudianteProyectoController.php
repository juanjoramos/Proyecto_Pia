<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Proyecto;
use App\Models\EstudianteProyecto;
use Illuminate\Http\Request;

class EstudianteProyectoController extends Controller
{
    public function index()
    {
        $estudianteProyectos = EstudianteProyecto::with(['estudiante', 'proyecto'])->get();
        return view('estudiante_proyectos.index', compact('estudianteProyectos'));
    }

    public function create()
    {
        $estudiantes = Estudiante::all();
        $proyectos = Proyecto::all();
        return view('estudiante_proyectos.create', compact('estudiantes', 'proyectos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,estudiante_id',
            'proyecto_id' => 'required|exists:proyectos,id',
        ]);

        EstudianteProyecto::create($request->only(['estudiante_id', 'proyecto_id']));

        return redirect()->route('estudiante_proyectos.index')->with('success', 'Asignación creada exitosamente.');
    }

    public function edit(EstudianteProyecto $estudianteProyecto)
    {
        $estudiantes = Estudiante::all();
        $proyectos = Proyecto::all();
        return view('estudiante_proyectos.edit', compact('estudianteProyecto', 'estudiantes', 'proyectos'));
    }

    public function update(Request $request, EstudianteProyecto $estudianteProyecto)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,estudiante_id',
            'proyecto_id' => 'required|exists:proyectos,id',
        ]);

        $estudianteProyecto->update($request->only(['estudiante_id', 'proyecto_id']));

        return redirect()->route('estudiante_proyectos.index')->with('success', 'Asignación actualizada exitosamente.');
    }

    public function destroy(EstudianteProyecto $estudianteProyecto)
    {
        $estudianteProyecto->delete();

        return redirect()->route('estudiante_proyectos.index')
                         ->with('success', 'Asignación eliminada exitosamente.');
    }
}