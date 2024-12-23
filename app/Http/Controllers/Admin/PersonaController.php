<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.persona.index');
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
            'dni'=>'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'programa_id' => 'required',
        ]);
        $personas = new persona();
        $personas->dni = $validatedData['dni'];
        $personas->nombres = $validatedData['nombres'];
        $personas->apellidos = $validatedData['apellidos'];
        $personas->programa_id = $validatedData['programa_id'];
        $personas->save();
        if ($personas){
            return redirect()->route('admin.persona.index')->with('success', 'La persona fue registrado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se registro correctamente la persona:' . $personas->getMessage());
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
            'dni'=>'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'programa_id' => 'required',
        ]);
        $personas = persona::findOrFail($id);
        $personas->dni = $validatedData['dni'];
        $personas->nombres = $validatedData['nombres'];
        $personas->apellidos = $validatedData['apellidos'];
        $personas->programa_id = $validatedData['programa_id'];
        $personas->save();
        if ($personas){
            return redirect()->route('admin.persona.index')->with('success', 'La persona fue actualizado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se actualizo correctamente la persona:' . $personas->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personas = persona::findOrFail($id);
        $personas->delete();
        if ($personas){
            return redirect()->route('admin.persona.index')->with('success', 'La persona fue eliminado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se elimino correctamente la persona:' . $personas->getMessage());
        }
    }
}
