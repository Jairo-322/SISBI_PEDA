<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.editorial.index');
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
            'nombre_editorial'=>'required',
        ]);
        $editoriales=new editorial();
        $editoriales->nombre_editorial=$validatedData['nombre_editorial'];
        $editoriales->save();
        if ($editoriales){
            return redirect()->route('admin.editorial.index')->with('success', 'La editorial fue registrado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se registro correctamente la editorial:' . $editoriales->getMessage());
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
            'nombre_editorial'=>'required',
        ]);
        $editoriales = editorial::findOrFail($id);
        $editoriales->nombre_editorial = $validatedData['nombre_editorial'];
        $editoriales->save();
        if ($editoriales){
            return redirect()->route('admin.editorial.index')->with('success', 'La editorial fue actualizado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se actualizo correctamente la editorial:' . $editoriales->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $editoriales = editorial::findOrFail($id);
        $editoriales->delete();
        if ($editoriales){
            return redirect()->route('admin.editorial.index')->with('success', 'La editorial fue eliminado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se elimino correctamente la editorial:' . $editoriales->getMessage());
        }
    }
}
