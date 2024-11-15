<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class programa extends Model
{
    protected $fillable=[
        'nombre_programa',
        'abreviatura',
    ];
    public function persona()
    {
        return $this->hasMany(persona::class);
    }
}