<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    protected $table='libros';
    protected $fillable=[
        'titulo',
        'subtitulo',
        'descripcion',
        'isbn',
        'editorial_id',
        'autor_id',
        'categoria_id',
        'edicion',
        'anio_publicacion',
        'idioma',
        'stock',
        'fecha_adquisicion'
    ];

    public function editorial(){
        return $this->belongsTo(editorial::class);
    }
    public function autor(){
        return $this->belongsTo(autor::class);
    }
    public function categoria(){
        return $this->belongsTo(categoria::class);
    }
}
