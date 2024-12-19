<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nacionalidad extends Model
{
    protected $table = 'nacionalidades';

    protected $fillable = [
        'nacionalidad',
        'pais',
    ];
    public function autor(){
        return $this->hasMany(autor::class);
    }
}
