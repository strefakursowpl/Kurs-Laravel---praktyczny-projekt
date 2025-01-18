<div @class([
    'rounded-2xl border border-light-gray p-6 xl:p-12 relative',
    'hidden' => $isFavoritesPage && !$isFavorite
])>
    <div
        class="grid grid-cols-1 gap-6 lg:gap-12 xl:grid-cols-[144px_1fr_144px]"
        x-on:inquiry-sent="$wire.isInquirySent = true"
    >
        <div class="flex size-36 items-center justify-center rounded-2xl border border-light-gray p-2">
            <img src="/storage/{{$job->logo}}" alt="{{$job->company_name}}" />
        </div>
        <div class="space-y-3">
            <div class="text-2xl font-semibold lg:text-4xl">
                {{$job->position}}
            </div>
            <x-ui.salary :salaryFrom="$job->salary_from" :salaryTo="$job->salary_to" />
            <div class="text-xl font-light lg:text-3xl">
                {{$job->company_name}}
                <div class="text-base">({{$job->location}})</div>
            </div>
        </div>
        <div class="flex flex-col justify-between">
            @guest
                <x-button
                    class="[&_svg]:size-7 btn-circle btn-ghost absolute right-10 top-10 ml-auto xl:static"
                    icon="o-heart"
                    x-on:click="$dispatch('open-login-modal')"
                />
                <x-button
                    class="btn-secondary translate-x-3"
                    label="Aplikuj"
                    x-on:click="$dispatch('open-login-modal')"
                />
            @endguest
            @auth
                <x-button
                    class="[&_svg]:size-7 btn-circle btn-ghost absolute right-10 top-10 ml-auto xl:static"
                    icon="{{ $isFavorite ? 's-heart' : 'o-heart' }}"
                    spinner
                    wire:click="toggleFavorite"
                />
                <x-button
                    class="btn-secondary translate-x-3"
                    label="Aplikuj"
                    wire:click="$dispatchTo('inquiries.inquiry-modal', 'open-inquiry-modal-{{ $job->id }}')"
                    x-cloak
                    x-show="!$wire.isInquirySent"
                />
                <x-button
                    class="translate-x-3"
                    label="Aplikowano"
                    link="/inquiries"
                    x-cloak
                    x-show="$wire.isInquirySent"
                />
                <livewire:inquiries.inquiry-modal :$job />
            @endauth
        </div>
    </div>
</div>
