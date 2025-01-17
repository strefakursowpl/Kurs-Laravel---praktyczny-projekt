<?php

namespace App\Livewire\Pages;

use App\Livewire\Forms\JobForm;
use App\Models\Job;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

#[Title('Edytuj ofertę')]
class JobEditPage extends Component
{

    use Toast, WithFileUploads;

    public Job $job;

    public JobForm $form;

    public function mount(Job $job) {
        $this->form->fill($job);
    }

    public function save() {
        
        $data = $this->validate();

        if($this->form->logoToUpload) {
            $url = $this->form->logoToUpload->store('company_logos', 'public');
            $data['logo'] = $url;
            Storage::disk('public')->delete($this->job->logo);
        }

        $this->job->update($data);

        $this->success('Zaktualizowano ogłoszenie', redirectTo: '/jobs');
    }

    public function render()
    {
        return view('livewire.pages.job-edit-page');
    }
}
