<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.register');
    }

    public function store(){
        $user = User::create([
            'name' => $this->name,
            'email' =>$this->email,
            'password' => Hash::make($this->password)
        ]);

        session()->flash('success', 'Akun berhasil dibuat');
    }
}
