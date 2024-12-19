<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.programa.index');
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
        $validatedData = $request->validate([
            'nombre_programa' => 'required',
            'abreviatura' => 'required',
        ]);
        $programas = new programa();
        $programas->nombre_programa = $validatedData['nombre_programa'];
        $programas->abreviatura = $validatedData['abreviatura'];
        $programas->save();
        if ($programas){
            return redirect()->route('admin.programa.index')->with('success', 'La programa fue registrado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se registro correctamente la programa:' . $programas->getMessage());
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
        $validatedData = $request->validate([
            'nombre_programa' => 'required',
            'abreviatura' => 'required',
        ]);

        $programas = programa::findOrFail($id);

        $programas->nombre_programa = $validatedData['nombre_programa'];
        $programas->abreviatura = $validatedData['abreviatura'];
        $programas->save();

        if ($programas){
            return redirect()->route('admin.programa.index')->with('success', 'La programa fue actualizado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se actualizo correctamente la programa:' . $programas->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $programas = programa::findOrFail($id);
        $programas->delete();
        if ($programas){
            return redirect()->route('admin.programa.index')->with('success', 'La programa fue eliminado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se elimino correctamente la programa:' . $programas->getMessage());
        }
    }
}
