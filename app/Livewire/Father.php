<?php

namespace App\Livewire;

use Livewire\Component;

class Father extends Component
{
    public $name="abner canter";

    public function redirigir(){
        return $this->redirect('/prueba',navigate:true);//spa
    }
    public function render()
    {
        return view('livewire.father');
    }
}
