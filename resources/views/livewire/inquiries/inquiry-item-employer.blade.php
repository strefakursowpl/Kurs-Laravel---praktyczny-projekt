<div
    x-on:cv-downloaded="$wire.changeStatus()"
    class="rounded-2xl border border-light-gray p-6 xl:p-12 relative"
>
    <x-badge
        value="{{ $inquiry->status->label() }}"
        @class([
            'absolute -top-2 -right-2',
            'badge-primary' => $inquiry->status === App\Enums\InquiryStatus::SENT,
            'badge-secondary' => $inquiry->status === App\Enums\InquiryStatus::READ,
            'badge-error' => $inquiry->status === App\Enums\InquiryStatus::REJECTED,
        ])
    />
    <div>
        Otrzymano: {{ $inquiry->created_at->format('d.m.Y H:i') }}
    </div>
    <div class="mt-5 grid grid-cols-1 xl:grid-cols-[144px_1fr_144px] gap-6 lg:gap-12">
        <img
            class="rounded-full size-36 object-cover"
            src="/storage/{{ $inquiry->user->avatar }}"
            alt="{{ $inquiry->user->name }}"
        />
        <div class="space-y-3">
            <div class="text-3xl">
                {{ $inquiry->user->name }}
            </div>
            @if (!empty($inquiry->user->links))
                <x-ui.links :links="$inquiry->user->links" />
            @endif
        </div>
    </div>
    <div class="prose lg:prose-md mt-5 break-words">
        @markdown($inquiry->content)
    </div>
    <livewire:elements.cv :fileName="$inquiry->cv_name" :fileUrl="$inquiry->cv_url" />
    <div class="mt-5 flex flex-col lg:flex-row gap-5">
        <x-button class="btn-primary">
            <a href="mailto:{{ $inquiry->user->email }}">Wyślij wiadomość</a>
        </x-button>
        @if ($inquiry->status !== App\Enums\InquiryStatus::REJECTED)
            <x-button
                label="Odrzuć"
                class="btn-error"
                spinner
                wire:click="rejectInquiry"
                wire:confirm="Czy napewno chcesz odrzucić tego kandydata?"
            />
        @endif
    </div>
</div>
