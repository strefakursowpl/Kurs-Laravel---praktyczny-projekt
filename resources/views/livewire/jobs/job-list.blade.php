<div>
    <div class="space-y-5">
        @forelse ($jobs as $job)
            <livewire:jobs.job-item :key="$job->id" :$job />
        @empty
            <p>Brak ogłoszeń</p>
        @endforelse
    </div>
</div>
