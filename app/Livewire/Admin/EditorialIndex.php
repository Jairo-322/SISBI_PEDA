<?php

namespace App\Livewire\Admin;

use App\Models\editorial;
use Livewire\Component;

class EditorialIndex extends Component
{
    public function render()
    {
        $editorial = editorial::all();
        return view('livewire.admin.editorial-index', compact ('editorial'));
    }
}
