<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class editorial extends Model
{
    protected $table = 'editoriales';
    protected $fillable = [
        'nombre_editorial'
    ];
}
