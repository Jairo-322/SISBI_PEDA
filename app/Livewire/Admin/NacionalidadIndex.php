<?php

namespace App\Livewire\Admin;

use App\Models\nacionalidad;
use Livewire\Component;

class NacionalidadIndex extends Component
{
    public function render()
    {
        $nacionalidad = nacionalidad::all();
        return view('livewire.admin.nacionalidad-index', compact('nacionalidad'));
    }
}
