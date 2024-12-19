<?php

namespace App\Livewire\Admin;

use App\Models\categoria;
use Livewire\Component;

class CategoriaIndex extends Component
{
    public function render()
    {
        $categoria=categoria::all();
        return view('livewire.admin.categoria-index', compact('categoria'));
    }
}
