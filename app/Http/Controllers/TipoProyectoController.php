<?php

namespace App\Http\Controllers;

use App\Models\TipoProyecto;
use Illuminate\Http\Request;

class TipoProyectoController extends Controller {
    
    public function index() {
        $tipos = TipoProyecto::all();
        return view('tipo_proyectos.index', compact('tipos'));
    }

    public function create() {
        //dd("HOLA!");
        return view('tipo_proyectos.create');
    }

    public function store(Request $request) {
        //dd($request->all());
        $request->validate([
            'codigo' => 'required|string|max:10',
            'descripcion' => 'required|string|max:255',
        ]);


        //dd($request->all());

        TipoProyecto::create($request->all());

        return redirect()->route('tipo-proyectos.index')
                         ->with('success', 'Tipo de proyecto creado exitosamente.');
    }

    public function edit(TipoProyecto $tipoProyecto) {
        return view('tipo_proyectos.edit', compact('tipoProyecto'));
    }

    public function update(Request $request, TipoProyecto $tipoProyecto) {
        $request->validate([
            'codigo' => 'required|string|max:10',
            'descripcion' => 'required|string|max:255',
        ]);

        $tipoProyecto->update($request->all());

        return redirect()->route('tipo-proyectos.index')
                         ->with('success', 'Tipo de proyecto actualizado.');
    }

    public function destroy(TipoProyecto $tipoProyecto) {
        $tipoProyecto->delete();

        return redirect()->route('tipo-proyectos.index')
                         ->with('success', 'Tipo de proyecto eliminado.');
    }
}
