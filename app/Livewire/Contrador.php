<?php

namespace App\Livewire;

use Livewire\Component;

class Contrador extends Component
{
    public $count=1;

    public function increment($num=1){
        $this->count+=$num;
    }
    public function decrement($num=1){
        $this->count-=$num;
    }
    public function render()
    {
        return view('livewire.contrador');
    }
}
