<?php

namespace App\Http\Livewire;

use App\Models\Berkas;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadBerkas extends Component
{
    use WithFileUploads;

    public $name;
    public $berkas;

    public function render(){
        return view('livewire.upload-berkas');
    }

    public function store(){
        $data = $this->validate([
            'name' => 'required',
            'berkas' => 'required'
        ]);
        // dd($this->berkas, get_class_methods($this->berkas));
        $fileName = time().'_'.$this->name.'.'.$this->berkas->getClientOriginalExtension();
        $filePath = $this->berkas->storeAs('uploads', $fileName ,'public');
        $data['name'] = $fileName;
        $data['path'] = $filePath;
        Berkas::create($data);

        $this->resetInput();

        $this->emit('berkasUploaded', $data);
    }

    public function resetInput(){
        $this->name = null;
        $this->berkas = null;
    }
}
