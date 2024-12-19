<?php

namespace App\Livewire\Admin;

use App\Models\autor;
use App\Models\nacionalidad;
use Livewire\Component;

class AutorIndex extends Component
{
    public function render()
    {
        $autor=autor::all();
        $nacionalidad=nacionalidad::all();
        return view('livewire.admin.autor-index', compact ('autor','nacionalidad'));
    }
}
