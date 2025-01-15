<?php

namespace App\Livewire\Elements;

use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Cv extends Component
{

    #[Reactive]
    public string $fileName = '';
    
    #[Reactive]
    public string $fileUrl = '';

    public function download() {
        return Storage::download($this->fileUrl, $this->fileName);
    }

    public function render()
    {
        return view('livewire.elements.cv');
    }
}
