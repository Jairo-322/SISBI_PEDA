<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\nacionalidad;
use App\Services\RestCountriesService;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class NacionalidadController extends Controller
{


    public function index()
    {
        return view ('admin.nacionalidad.index');
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
            'nacionalidad'=>'required',
            'pais'=>'required'
        ]);
        $nacionalidades=new nacionalidad();
        $nacionalidades->nacionalidad=$validatedData['nacionalidad'];
        $nacionalidades->pais=$validatedData['pais'];
        $nacionalidades->save();
        if ($nacionalidades){
            return redirect()->route('admin.nacionalidad.index')->with('success', 'La nacionalidad fue registrado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se registro correctamente la nacionalidad:' . $nacionalidades->getMessage());
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
            'nacionalidad'=>'required',
            'pais' => 'required',
        ]);
        $nacionalidades = nacionalidad::findOrFail($id);
        $nacionalidades->nacionalidad = $validatedData['nacionalidad'];
        $nacionalidades->pais = $validatedData['pais'];
        $nacionalidades->save();
        if ($nacionalidades){
            return redirect()->route('admin.nacionalidad.index')->with('success', 'La nacionalidad fue actualizado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se actualizo correctamente la nacionalidad:' . $nacionalidades->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nacionalidades = nacionalidad::findOrFail($id);
        $nacionalidades->delete();
        if ($nacionalidades){
            return redirect()->route('admin.nacionalidad.index')->with('success', 'La nacionalidad fue eliminado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se elimino correctamente la nacionalidad:' . $nacionalidades->getMessage());
        }
    }
}
