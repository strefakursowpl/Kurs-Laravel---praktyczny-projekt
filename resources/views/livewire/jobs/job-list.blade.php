<div id="job_list">
    <div class="space-y-5">
        @if (empty($filters['self']))
            @forelse ($jobs as $job)
                <livewire:jobs.job-item :key="$job->id" :$job :isFavoritesPage="!empty($filters['favorites'])" />
            @empty
                <p>Brak ogłoszeń</p>
            @endforelse
        @else
        @forelse ($jobs as $job)
                <livewire:jobs.job-item-employer :key="$job->id" :$job />
            @empty
                <p>Brak ogłoszeń</p>
            @endforelse
        @endif
    </div>
    @if($jobs->hasMorePages())
        <div class="p-4" x-intersect.full="$wire.loadMore()">
            <x-loading wire:loading wire:target="loadMore" />
        </div>
    @endif
</div>
