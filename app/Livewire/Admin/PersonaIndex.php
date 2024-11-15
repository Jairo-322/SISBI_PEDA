<?php

namespace App\Livewire\Admin;

use App\Models\persona;
use App\Models\programa;
use Livewire\Component;

class PersonaIndex extends Component
{
    public function render()
    {
        $programa = programa::all();
        $persona = persona::all();
        return view('livewire.admin.persona-index',compact('programa','persona'));
    }
}
