<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Institucion;

class EstudianteController extends Controller
{
    public function index() {
        return view('estudiantes.index', [
            'estudiantes' => Estudiante::with('institucion')->get()
        ]);
    }

    public function create() {
        return view('estudiantes.create', [
            'instituciones' => Institucion::all()
        ]);
    }
    
    public function edit(Estudiante $estudiante) {
        return view('estudiantes.edit', [
            'estudiante' => $estudiante,
            'instituciones' => Institucion::all()
        ]);
    }    
    
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:estudiantes',
            'codigo' => 'required|string|unique:estudiantes',
            'institucion_id' => 'required|exists:instituciones,id',
        ]);
    
        Estudiante::create($request->all());
    
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado exitosamente.');
    }
    
    public function update(Request $request, Estudiante $estudiante) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:estudiantes,correo,' . $estudiante->estudiante_id . ',estudiante_id',
            'codigo' => 'required|string|unique:estudiantes,codigo,' . $estudiante->estudiante_id . ',estudiante_id',
            'institucion_id' => 'required|exists:instituciones,id',
        ]);
    
        $estudiante->update($request->all());
    
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado exitosamente.');
    }
    

    public function destroy(Estudiante $estudiante) {
        $estudiante->delete();
        return redirect()->route('estudiantes.index');
    }
}