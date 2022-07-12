<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function render(){
        return view('livewire.login');
    }

    public function login(){
        $creds = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if(Auth::attempt($creds)){
            // dd($creds);
            return redirect()->to('/dashboard');
        }
        else{
            session()->flash('wrong creds', 'Email dan Password yang anda masukkan salah');
        }
    }
}
