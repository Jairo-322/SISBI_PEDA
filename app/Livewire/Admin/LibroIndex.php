<?php

namespace App\Livewire\Admin;

use App\Models\autor;
use App\Models\categoria;
use App\Models\editorial;
use App\Models\libro;
use Livewire\Component;

class LibroIndex extends Component
{
    public function render()
    {
        $libro=libro::all();
        $editorial=editorial::all();
        $autor=autor::all();
        $categoria=categoria::all();
        return view('livewire.admin.libro-index', compact('libro', 'editorial', 'autor', 'categoria'));
    }
}
