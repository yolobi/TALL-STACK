<?php

namespace App\Http\Livewire;

use App\Models\Berkas;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class BerkasUpdate extends Component
{
    public $name;
    public $file;
    public $fileId;

    public $listeners = [
        'editBerkas' => 'showContact'
    ];

    public function render()
    {
        return view('livewire.berkas-update');
    }

    public function showContact($berkas){
        $this->name = $berkas['name'];
        $this->fileId = $berkas['id'];
    }

    public function update(){
        $file = Berkas::find($this->fileId);
        // dd(dirname($file->path).'/'.$this->name);
        $extension = explode('.', $file->path);
        $extension = end($extension);
        // dd($extension);
        Storage::disk('public')->move($file->getOriginal('path'), dirname($file->path).'/'.$this->name.'.'.$extension);
        //path -> direktori/name
        $file->path = dirname($file->path).'/'.$this->name.'.'.$extension;
        $file->name = $this->name;
        // dd($file);
        $file->save();
        $this->emit('berkasUpdated', $file);
    }
}
