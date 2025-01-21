<?php

namespace App\Livewire\Inquiries;

use App\Enums\InquiryStatus;
use App\Models\Inquiry;
use Livewire\Component;

class InquiryItemEmployer extends Component
{

    public Inquiry $inquiry;

    public function rejectInquiry() {
        $this->inquiry->status = InquiryStatus::REJECTED;
        $this->inquiry->save();
    }

    public function changeStatus() {
        if($this->inquiry->status === InquiryStatus::SENT) {
            $this->inquiry->status = InquiryStatus::READ;
            $this->inquiry->save();
        }
    }

    public function render()
    {
        return view('livewire.inquiries.inquiry-item-employer');
    }
}
