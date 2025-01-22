<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\JobForm;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

#[Title('Dodaj ofertę')]
class JobCreatePage extends Component
{

    use Toast, WithFileUploads;

    public JobForm $form;

    public function mount() {
        $this->authorize('create', Job::class);
    }

    public function rules() {
        return [
            'form.logoToUpload' => [
                'required',
            ],
        ];
    }

    public function save() {
        
        $data = $this->validate();
        $data['employer_id'] = Auth::id();

        $url = $this->form->logoToUpload->store('company_logos', 'public');
        $data['logo'] = $url;

        Job::create($data);

        $this->success('Dodano ogłoszenie', redirectTo: '/jobs');
    }

    public function render()
    {
        return view('livewire.pages.job-create-page');
    }
}
