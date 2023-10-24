<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Foto;

class ShowFoto extends Component
{
    // Models
    public $codigo;

    // Useful vars
    public $results = [];

    public function render() 
    {
        return view('livewire.show-foto');
    }

    public function search(){
        $this->results = Foto::where('codigo', $this->codigo)->first();
    }
}
