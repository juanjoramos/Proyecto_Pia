<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ira;
use App\Models\Estudiante;
use App\Models\Era;

class IraController extends Controller
{
    public function index()
    {
        // Carga los IRA con su relación estudiante y era para mostrar datos relacionados
        $iras = Ira::with(['estudiante', 'era'])->get();
        return view('iras.index', compact('iras'));
    }

    public function create()
    {
        // Envía todos los estudiantes y eras para mostrar en los selects
        $estudiantes = Estudiante::all();
        $eras = Era::all();
        return view('iras.create', compact('estudiantes', 'eras'));
    }

    public function store(Request $request)
    {
        // Validar datos recibidos del formulario
        $request->validate([
            'valor' => 'required|numeric',
            'observaciones' => 'nullable|string',
            'estudiante_id' => 'required|exists:estudiantes,estudiante_id',
            'era_id' => 'required|exists:eras,era_id',
        ]);

        // Crear nuevo IRA con los datos validados
        Ira::create($request->only(['valor', 'observaciones', 'estudiante_id', 'era_id']));

        // Redireccionar con mensaje de éxito
        return redirect()->route('iras.index')->with('success', 'IRA creado exitosamente.');
    }

    public function edit(Ira $ira)
    {
        // Obtener todos los estudiantes y eras para los selects y pasar el IRA para editar
        $estudiantes = Estudiante::all();
        $eras = Era::all();
        return view('iras.edit', compact('ira', 'estudiantes', 'eras'));
    }

    public function update(Request $request, Ira $ira)
    {
        // Validar datos para actualizar
        $request->validate([
            'valor' => 'required|numeric',
            'observaciones' => 'nullable|string',
            'estudiante_id' => 'required|exists:estudiantes,estudiante_id',
            'era_id' => 'required|exists:eras,era_id',
        ]);

        // Actualizar IRA con los datos validados
        $ira->update($request->only(['valor', 'observaciones', 'estudiante_id', 'era_id']));

        // Redireccionar con mensaje de éxito
        return redirect()->route('iras.index')->with('success', 'IRA actualizado exitosamente.');
    }

    public function destroy(Ira $ira)
    {
        // Eliminar el IRA
        $ira->delete();

        // Redireccionar con mensaje de éxito
        return redirect()->route('iras.index')->with('success', 'IRA eliminado exitosamente.');
    }
}