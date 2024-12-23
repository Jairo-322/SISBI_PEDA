<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable=[
        'nombre_categoria',
        'descripcion',
    ];
    public function libros(){
        return $this->hasMany(libro::class);
    }
}
