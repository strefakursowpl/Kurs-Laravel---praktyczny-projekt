<?php

namespace App\Livewire\Inquiries;

use App\Models\Inquiry;
use Livewire\Component;

class InquiryItemUser extends Component
{
    public Inquiry $inquiry;

    public function render()
    {
        return view('livewire.inquiries.inquiry-item-user');
    }
}
