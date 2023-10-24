<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Foto;

class Main extends Component
{ 
    // Models
    public $codigo, $showCodigo = false;

    // Events
    protected $listeners = ['savePhotoListener' => 'savePhoto'];

    public function render() 
    {
        return view('livewire.main');
    }

    public function savePhoto($photo_url){
        $foto = new Foto;
        $foto->codigo = $this->claveThree();
        $foto->save();
        
        $data_uri = $photo_url;
        $encoded_image = explode(",", $data_uri)[1];
        $decoded_image = base64_decode($encoded_image);
        file_put_contents("storage/fotos/$foto->id.png", $decoded_image);
        
        $this->codigo = $foto->codigo;
        $this->showCodigo = !$this->showCodigo;
        return redirect()->back();
    }

    public function claveThree($length = 6) { 
        $codigo = substr(str_shuffle("12345ABCD"), 0, $length); 
        $foto = Foto::where('codigo', $codigo)->first();
        if ($foto){
            $this->claveThree();
        }
        return $codigo;
    }
}
