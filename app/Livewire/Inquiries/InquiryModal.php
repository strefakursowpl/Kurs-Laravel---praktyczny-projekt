<?php

namespace App\Livewire\Inquiries;

use App\Enums\InquiryStatus;
use App\Mail\NewInquiryMail;
use App\Models\Inquiry;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\File;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class InquiryModal extends Component
{

    use Toast, WithFileUploads;

    public bool $modal = false;

    public Job $job;

    public string|null $content = null;

    public string|null $userCVName = null;

    public string|null $userCVUrl = null;

    public $cvToUpload;

    public function rules() {
        return [
            'content' => [
                'required',
                'min:10',
                'max:4096',
            ],
            'cvToUpload' => [
                'nullable',
                File::types([
                    'application/pdf',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                ])
                ->min('10kb')
                ->max('10mb')
            ]
        ];
    }

    public function messages() {
        return [
            'between' => [
                'file' => 'Plik musi mieć rozmiar w zakresie :min kb - :max mb',
            ],
        ];
    }

    public function mount() {

        $user = Auth::user();

        $this->content = $user->content;
        $this->userCVName = $user->cv_name;
        $this->userCVUrl = $user->cv_url;
    }

    #[On('open-inquiry-modal-{job.id}')]
    public function openInquiryModal() {
        
        $this->authorize('create', Inquiry::class);

        $this->job->views++;
        $this->job->save();
    }

    public function sendInquiry() {

        $this->authorize('create', Inquiry::class);

        $data = $this->validate();

        $alreadySent = Inquiry::query()
            ->where('job_id', $this->job->id)
            ->where('user_id', Auth::id())
            ->exists();

        if($alreadySent) {
            $this->modal = false;
            $this->error('Nie można przesłać drugi raz tego samego zapytania');
            return false;
        }

        $url = $this->userCVUrl;
        $data['cv_name'] = $this->userCVName;

        if($this->cvToUpload) {
            $url = $this->cvToUpload->store('cvs');
            $data['cv_name'] = $this->cvToUpload->getClientOriginalName();
        }
        if(!$url) {
            $this->addError('cvToUpload', 'Aby wysłać zapytanie, należy przesłać CV');
            return false;
        }
        $data['cv_url'] = $url;
        $data['user_id'] = Auth::id();
        $data['employer_id'] = $this->job->employer_id;
        $data['job_id'] = $this->job->id;
        $data['status'] = InquiryStatus::SENT;

        $inquiry = Inquiry::create($data);

        $this->job->inquiries++;
        $this->job->save();

        Mail::to($this->job->user->email)->queue(
            new NewInquiryMail($inquiry)
        );

        $this->dispatch('inquiry-sent');

        $this->reset(['cvToUpload', 'content']);
        $this->modal = false;
        $this->success('Zapytanie o pracę zostało wysłane');
    }

    public function render()
    {
        return view('livewire.inquiries.inquiry-modal');
    }
}
