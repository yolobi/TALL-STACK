<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public $tab;

    public function mount(){
        $this->tab = 'login';
    }

    public function render()
    {
        return view('livewire.welcome');
    }
}
