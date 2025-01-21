<div class="rounded-2xl border border-light-gray p-6 xl:p-12 relative">
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
        Wysłano: {{ $inquiry->created_at->format('d.m.Y H:i') }}
    </div>
    <div class="mt-5 grid grid-cols-1 xl:grid-cols-[144px_1fr_144px] gap-6 lg:gap-12">
        <div class="rounded-2xl border size-36 border-light-gray p-2 flex justify-center items-center">
            <img src="/storage/{{ $inquiry->job->logo }}" alt="{{ $inquiry->job->company_name }}" />
        </div>
        <div class="space-y-3">
            <div class="text-2xl lg:text-4xl font-semibold">
                {{ $inquiry->job->position }}
            </div>
            <x-ui.salary :salaryFrom="$inquiry->job->salary_from" :salaryTo="$inquiry->job->salary_to" />
            <div class="text-xl font-light lg:text-3xl">
                {{ $inquiry->job->company_name }}
                <span class="text-base">({{ $inquiry->job->location }})</span>
            </div>
        </div>
    </div>
    <div class="prose lg:prose-md mt-5 break-words">
        @markdown($inquiry->content)
    </div>
    <livewire:elements.cv :fileName="$inquiry->cv_name" :fileUrl="$inquiry->cv_url" />
</div>
