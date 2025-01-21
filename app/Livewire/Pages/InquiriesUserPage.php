<?php

namespace App\Livewire\Pages;

use App\Models\Inquiry;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Zapytania o pracę')]
class InquiriesUserPage extends Component
{
    public int $perPage = 5;
    
    public function loadMore() {
        $this->perPage += 5;
    }

    public function inquiries() {
        return Inquiry::latest()->where('user_id', Auth::id())->with('user')->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.pages.inquiries-user-page', [
            'inquiries' => $this->inquiries()
        ]);
    }
}
