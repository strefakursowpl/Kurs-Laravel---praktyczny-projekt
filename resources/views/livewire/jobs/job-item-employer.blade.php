<div
    @class([
        'rounded-2xl border border-light-gray p-6 lg:p-12 relative',
        'hidden' => !$job->exists
    ])
>
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 lg:gap-12">
        <div class="space-y-5">
            <h3 class="text-3xl font-semibold">
                {{ $job->position }}
            </h3>
            <div class="flex flex-col lg:flex-row gap-5 lg:gap-7">
                <div class="flex gap-2 items-center">
                    <x-icon name="o-calendar-days" />
                    <div>
                        {{ $job->created_at->format('d.m.Y H:i') }} - {{ $job->created_at->addDays(30)->format('d.m.Y H:i') }}
                    </div>
                </div>
                <div class="flex gap-2 items-center">
                    <x-icon name="o-map-pin" /> {{$job->location}}
                </div>
            </div>
            <div class="flex gap-2">
                <div class="py-2 px-5 flex bg-silver rounded-lg gap-2 items-center">
                    <x-icon name="o-eye" />
                    {{ $job->views }}
                </div>
                <div class="py-2 px-5 flex bg-silver rounded-lg gap-2 items-center">
                    <x-icon name="o-heart" />
                    {{ $job->likes }}
                </div>
                <div class="py-2 px-5 flex bg-silver rounded-lg gap-2 items-center">
                    <x-icon name="o-user-group" />
                    {{ $job->inquiries }}
                </div>
            </div>
        </div>
        <div class="flex flex-col items-start lg:items-center justify-center gap-7 sm:max-w-[50%] lg:mx-auto">
            <x-button
                label="Edytuj ofertę"
                link="/jobs/{{ $job->id }}/edit"
                class="btn-primary w-full"
            />
            <x-button
                label="Zobacz kandydatów"
                link="/jobs/{{ $job->id }}/inquiries"
                class="btn-secondary w-full"
            />
            <x-button
                label="Usuń ogłoszenie"
                wire:click="deleteJob"
                spinner
                wire:confirm="Czy napewno chcesz usunąć to ogłoszenie?"
                class="btn-error w-full"
            />
        </div>
    </div>
</div>
