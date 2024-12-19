<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categoria;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categoria.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
                'nombre_categoria'=>'required',
                'descripcion'=>'nullable',
            ]);
        $categorias=new categoria();
        $categorias->nombre_categoria=$validatedData['nombre_categoria'];
        $categorias->descripcion=$validatedData['descripcion'];
        $categorias->save();
        if($categorias){
            return redirect()->route('admin.categoria.index')->with('success', 'La categoria fue registrada correctamente.');
        } else {
            return redirect()->back()->withErrors('No se registro correctamente la categoria:' . $categorias->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData  = $request->validate([
            'nombre_categoria'=>'required',
            'descripcion'=>'nullable',
        ]);
        $categorias = categoria::findOrFail($id);
        $categorias->nombre_categoria = $validatedData['nombre_categoria'];
        $categorias->descripcion = $validatedData['descripcion'];
        $categorias->save();
        if ($categorias){
            return redirect()->route('admin.categoria.index')->with('success', 'La categoria fue actualizado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se actualizo correctamente la categoria:' . $categorias->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria=categoria::findOrFail($id);
        $categoria->delete();
        if ($categoria){
            return redirect()->route('admin.categoria.index')->with('success', 'La categoria fue eliminado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se elimino correctamente la categoria:' . $categoria->getMessage());
        }
    }
}
