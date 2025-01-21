<x-slot:subTitle>{{ $job->position }}</x-slot:subTitle>
<section>
    <div class="space-y-5">
        @forelse ($inquiries as $inquiry)
            <livewire:inquiries.inquiry-item-employer :key="$inquiry->id" :$inquiry />
        @empty
            <p>Brak zapytań</p>
        @endforelse
    </div>
    @if($inquiries->hasMorePages())
        <div class="p-4" x-intersect.full="$wire.loadMore()">
            <x-loading wire:loading wire:target="loadMore" />
        </div>
    @endif
</section>
