@assets
    <link
        href="/assets/easymde.min.css"
        rel="stylesheet"
    />
    <script src="/assets/easymde.min.js"></script>
@endassets
<div x-on:open-inquiry-modal-{{ $job->id }}="$wire.modal = true">
    @teleport('body')
        <div>
            <x-modal
                box-class="text-dark-blue lg:max-w-[clamp(300px,_75%,_1500px)]"
                title="Złóż zapytanie o pracę"
                subtitle="Stanowisko: {{ $job->position }} ({{ $job->location }})"
                wire:model="modal"
            >
                <div class="space-y-4">
                    <div>
                        <h3>{{ $job->company_name }}</h3>
                        <div class="flex size-36 items-center justify-center rounded-2xl border border-light-gray p-2">
                            <img
                                alt="{{ $job->company_name }}"
                                src="/storage/{{ $job->logo }}"
                            />
                        </div>
                    </div>
                    <div>
                        <h3>Opis stanowiska:</h3>
                        <div class="lg:prose prose break-words">
                            @markdown($job->description)
                        </div>
                    </div>
                    <div>
                        <h3>Rodzaj umowy:</h3>
                        <div>
                            {{ $job->type->label() }}
                        </div>
                    </div>
                    <div>
                        <h3>Doświadczenie:</h3>
                        <div>
                            {{ $job->experience_level->label() }}
                        </div>
                    </div>
                    <div>
                        <h3>Wymiar pracy:</h3>
                        <div>
                            {{ $job->schedule->label() }}
                        </div>
                    </div>
                    <div>
                        <h3>Tryb pracy:</h3>
                        <div>
                            {{ $job->mode->label() }}
                        </div>
                    </div>
                    <div>
                        <h3>Wynagrodzenie</h3>
                        <x-ui.salary
                            :salaryFrom="$job->salary_from"
                            :salaryTo="$job->salary_to"
                            small
                        />
                    </div>
                    <x-form
                        class="[&>div]:overflow-hidden"
                        wire:submit="sendInquiry"
                    >
                        <x-markdown
                            :config="config('clickforjob.easeMDEConfig')"
                            label="Treść zapytania"
                            wire:model="content"
                        />
                        @isset($userCVName)
                            <p>Twoje CV o nazwie: <strong>{{ $userCVName }}</strong></p>
                            <p>Zostanie przesłane jeżeli nei wybierzesz innego pliku CV.</p>
                        @endisset
                        <x-file
                            accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                            hideProgress
                            label="CV"
                            wire:model="cvToUpload"
                        />
                        <x-loading
                            wire:loading
                            wire:target="cvToUpload"
                        />
                        <x-button
                            class="btn-primary mt-4"
                            label="Wyślij"
                            spinner="sendInquiry"
                            type="submit"
                            wire:loading.class="bg-gray pointer-events-none"
                            wire:target="cvToUpload"
                        />
                    </x-form>
                </div>
            </x-modal>
        </div>
    @endteleport
</div>
