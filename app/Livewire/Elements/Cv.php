<?php

namespace App\Livewire\Elements;

use Livewire\Component;

class Cv extends Component
{

    public string $fileName = '';
    
    public string $fileUrl = '';

    public function download() {

    }

    public function render()
    {
        return view('livewire.elements.cv');
    }
}
