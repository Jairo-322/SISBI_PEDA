<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autor extends Model
{
    protected $table="autores";
    use HasFactory;
    protected $fillable =[
        'nombres',
        'apellidos',
        'nacionalidad_id'
    ];

    public function nacionalidad()
    {
        return $this->belongsTo(nacionalidad::class);
    }
}
