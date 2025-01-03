<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.libro.index');
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
            'titulo' => 'required',
            'subtitulo' => 'required',
            'descripcion' => 'required',
            'edicion' => 'required',
            'isbn' => 'required',
            'editorial_id' => 'required',
            'autor_id' => 'required',
            'categoria_id' => 'required',
            'anio_publicacion' => 'required',
            'idioma' => 'required',
            'stock' => 'required',
            'fecha_adquisicion'=>'required',
        ]);
        $libros = new libro();
        $libros->titulo = $validatedData['titulo'];
        $libros->subtitulo = $validatedData['subtitulo'];
        $libros->descripcion = $validatedData['descripcion'];
        $libros->edicion = $validatedData['edicion'];
        $libros->isbn = $validatedData['isbn'];
        $libros->editorial_id = $validatedData['editorial_id'];
        $libros->autor_id = $validatedData['autor_id'];
        $libros->categoria_id = $validatedData['categoria_id'];
        $libros->anio_publicacion = $validatedData['anio_publicacion'];
        $libros->idioma = $validatedData['idioma'];
        $libros->stock = $validatedData['stock'];
        $libros->fecha_adquisicion = $validatedData['fecha_adquisicion'];
        $libros->save();
        if ($libros) {
            return redirect()->route('admin.libro.index')->with('success', 'El libro creado exitosamente');
        }else{
            return redirect()->route('admin.libro.index')->with('error', 'Error al crear el libro');
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
            'titulo' => 'required',
            'subtitulo' => 'required',
            'descripcion' => 'required',
            'edicion' => 'required',
            'isbn' => 'required',
            'editorial_id' => 'required',
            'autor_id' => 'required',
            'categoria_id' => 'required',
            'anio_publicacion' => 'required',
            'idioma' => 'required',
            'stock' => 'required',
            'fecha_adquisicion'=>'required',
        ]);
        $libros = libro::find($id);
        $libros->titulo = $validatedData['titulo'];
        $libros->subtitulo = $validatedData['subtitulo'];
        $libros->descripcion = $validatedData['descripcion'];
        $libros->edicion = $validatedData['edicion'];
        $libros->isbn = $validatedData['isbn'];
        $libros->editorial_id = $validatedData['editorial_id'];
        $libros->autor_id = $validatedData['autor_id'];
        $libros->categoria_id = $validatedData['categoria_id'];
        $libros->anio_publicacion = $validatedData['anio_publicacion'];
        $libros->idioma = $validatedData['idioma'];
        $libros->stock = $validatedData['stock'];
        $libros->fecha_adquisicion = $validatedData['fecha_adquisicion'];
        $libros->save();
        if ($libros){
            return redirect()->route('admin.libro.index')->with('success', 'El libro fue actualizado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se actualizo correctamente el libro:' . $libros->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $libros = libro::find($id);
        $libros->delete();
        if ($libros){
            return redirect()->route('admin.libro.index')->with('success', 'El libro fue eliminado correctamente.');
        } else {
            return redirect()->back()->withErrors('No se elimino correctamente el libro:' . $libros->getMessage());
        }
    }
}
