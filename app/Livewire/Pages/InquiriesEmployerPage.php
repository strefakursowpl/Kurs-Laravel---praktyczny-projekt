<?php

namespace App\Livewire\Pages;

use App\Models\Inquiry;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Kandydaci na stanowisko')]
class InquiriesEmployerPage extends Component
{
    
    public Job $job;

    public int $perPage = 5;

    public function mount(Job $job) {
        $this->job = $job;
    }

    public function loadMore() {
        $this->perPage += 5;
    }

    public function inquiries() {
        return Inquiry::latest()->where('employer_id', Auth::id())->where('job_id', $this->job->id)->with('user')->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.pages.inquiries-employer-page', [
            'inquiries' => $this->inquiries()
        ]);
    }
}
