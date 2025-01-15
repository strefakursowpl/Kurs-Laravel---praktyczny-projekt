<div id="job_list">
    <div class="space-y-5">
        @forelse ($jobs as $job)
            <livewire:jobs.job-item :key="$job->id" :$job :isFavoritesPage="!empty($filters['favorites'])" />
        @empty
            <p>Brak ogłoszeń</p>
        @endforelse
    </div>
    @if($jobs->hasMorePages())
        <div class="p-4" x-intersect.full="$wire.loadMore()">
            <x-loading wire:loading wire:target="loadMore" />
        </div>
    @endif
</div>
