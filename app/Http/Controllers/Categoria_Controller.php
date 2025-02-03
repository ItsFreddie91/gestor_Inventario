<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class Categoria_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Personalizando mensajes de error
        $messages = [
            'Categoria.unique' => 'La categoría ya existe, por favor ingrese una nueva.'
        ];

        $request->validate([
            'Categoria' => 'required|unique:categorias,nombre_categoria'
        ], $messages);

        $item = new Categoria();
        $item->nombre_categoria = $request->Categoria;
        $item->save();
        
        return redirect()->back()->with(['Categoria_Agregada'=>'Agregado']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
