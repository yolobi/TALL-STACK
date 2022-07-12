<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $statusEdit = false;

    public $listeners = [
        'getContact' => 'changeForm',
        'berkasUpdated' => 'changeFormAgain'
    ];

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function changeForm($berkas){
        $this->statusEdit = true;
        $this->emit('editBerkas', $berkas);
    }

    public function changeFormAgain(){
        $this->statusEdit = false;
    }

    public function logout(){
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->to('/');
    }
}
