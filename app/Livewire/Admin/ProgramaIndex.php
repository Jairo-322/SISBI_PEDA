<?php

namespace App\Livewire\Admin;

use App\Models\programa;
use Livewire\Component;

class ProgramaIndex extends Component
{
    public function render()
    {
        $programa=programa::all();
        return view('livewire.admin.programa-index',compact('programa'));
    }
}
