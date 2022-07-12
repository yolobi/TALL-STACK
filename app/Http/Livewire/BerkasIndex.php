<?php

namespace App\Http\Livewire;

use App\Models\Berkas;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class BerkasIndex extends Component
{
    use WithPagination;
    public $listeners = [
        'berkasUploaded' => 'handleUploaded',
        'berkasUpdated' => 'handleUpdated'
    ];

    public function render()
    {
        return view('livewire.berkas-index', [
            'berkas' => Berkas::latest()->paginate(5)
        ]);
    }

    public function editBerkas($id){
        $berkas = Berkas::find($id);
        $this->emit('getContact', $berkas);
    }

    public function handleUploaded($data){
        // dd($data);
        session()->flash('success', 'Berkas '. $data['name'].' berhasil diupload');
    }

    public function handleUpdated($data){
        // dd($data);
        session()->flash('success update', 'Berkas '. $data['name'].' berhasil diupdate');
    }

    public function destroy($id){
        $file = Berkas::find($id);
        $filePath = $file->path;
        Storage::disk('public')->delete($filePath);
        $file->delete();
    }
}
