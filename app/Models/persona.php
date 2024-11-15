<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    protected $fillable = [
        'dni',
        'nombres',
        'apellidos',
        'programa_id',
    ];

    public function programa()
    {
        return $this->belongsTo(programa::class);
    }
}
