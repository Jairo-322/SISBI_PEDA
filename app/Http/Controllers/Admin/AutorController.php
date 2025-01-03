<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.autor.index');
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
            'nombres'=>'required',
            'apellidos'=>'required',
            'nacionalidad_id'=>'required',
        ]);

        $autor=new autor();
        $autor->nombres=$validatedData['nombres'];
        $autor->apellidos=$validatedData['apellidos'];
        $autor->nacionalidad_id=$validatedData['nacionalidad_id'];
        $autor->save();
        if($autor){
            return redirect()->route('admin.autor.index')->with('success', 'El autor fue creado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se creo correctamente el autor:' . $autor->getMessage());
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
        $validatedData=$request->validate([
            'nombres'=>'required',
            'apellidos'=>'required',
            'nacionalidad_id'=>'required',
        ]);
        $autor=autor::findOrFail($id);
        $autor->nombres=$validatedData['nombres'];
        $autor->apellidos=$validatedData['apellidos'];
        $autor->nacionalidad_id=$validatedData['nacionalidad_id'];
        $autor->save();
        if($autor){
            return redirect()->route('admin.autor.index')->with('success', 'El autor fue actualizado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se actualizo correctamente el autor:' . $autor->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $autor=autor::findOrFail($id);
        $autor->delete();
        if ($autor){
            return redirect()->route('admin.autor.index')->with('success', 'El autor fue eliminado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se elimino correctamente el autor:' . $autor->getMessage());
        }
    }
}
