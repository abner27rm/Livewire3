<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class CreatePost extends Component
{
    public $name,$email;
    public $title;
    public function mount(User $user){//una instancia de la clase user
      /*  $this->email =$user->email;
        $this->name =$user->name;*/
        $this->fill(
            $user->only(['name','email'])
        );

    }

    public function save()
    {
       /* dd($this->name);*/
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
