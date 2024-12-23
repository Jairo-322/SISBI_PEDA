<?php

namespace App\Livewire\Admin;

use App\Models\libro;
use Livewire\Component;

class LibroIndex extends Component
{
    public function render()
    {
        $libro=libro::all();
        return view('livewire.admin.libro-index', compact('libro'));
    }
}
