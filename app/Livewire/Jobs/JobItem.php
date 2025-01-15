<?php

namespace App\Livewire\Jobs;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Mary\Traits\Toast;

class JobItem extends Component
{
    
    use Toast;

    public Job $job;

    public bool $isFavorite = false;

    public bool $isFavoritesPage = false;

    public function mount() {
        $this->isFavorite = $this->job->favoriteJobs()->wherePivot('user_id', Auth::id())->exists();
    }

    public function toggleFavorite() {
        $toggleResults = $this->job->favoriteJobs()->toggle(Auth::id());

        if(!empty($toggleResults['attached'])) {
            $this->job->likes++;
        } else {
            $this->job->likes--;
        }
        $this->job->save();

        $this->isFavorite = !$this->isFavorite;
    }

    public function render()
    {
        return view('livewire.jobs.job-item');
    }
}
