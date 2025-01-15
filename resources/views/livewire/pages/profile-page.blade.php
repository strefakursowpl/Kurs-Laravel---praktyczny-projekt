@assets
    <link
        href="/assets/easymde.min.css"
        rel="stylesheet"
    />
    <script src="/assets/easymde.min.js"></script>
    <link
        href="/assets/cropper.min.css"
        rel="stylesheet"
    />
    <script src="/assets/cropper.min.js"></script>
@endassets
<section class="rounded-2xl border border-light-gray px-6 py-12 relative">
    <div x-show="$wire.isProfileView">
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">
            <div>
                <img
                    class="size-40 rounded-full object-cover"
                    src="{{ $user->avatar ? '/storage/' . $user->avatar : '/empty-user.jpg'}}"
                />
                <x-loading
                    wire:loading
                    wire:target="avatarToUpload"
                />
            </div>
            <div class="relative col-span-3 space-y-3">
                <p class="text-xl">Dane podstawowe</p>
                <div class="text-lg font-semibold lg:text-3xl">{{ $user->name }}</div>
                @empty($user->links)
                    <p class="text-gray">Brak linków</p>
                @else
                    <x-ui.links :links="$user->links" />
                @endempty
            </div>
        </div>
        <div class="mt-5 space-y-5">
            <div>
                <p class="mb-2 text-xl">Wiadomość do rekrutera</p>
                @isset($user->content)
                    <div class="lg:prose-md prose mt-5 max-w-full break-words rounded-3xl bg-silver p-6">
                        @markdown($user->content)
                    </div>
                @else
                    <p class="text-gray">Brak domyślnej wiadomości</p>
                @endisset
            </div>
            <div>
                <p class="mb-2 text-xl">Twoje CV</p>
                @isset($user->cv_name)
                    <livewire:elements.cv :fileName="$user->cv_name" :fileUrl="$user->cv_url" />
                @else
                    <p class="text-gray">Brak domyślnego CV</p>
                @endisset
            </div>
        </div>
        <x-button
            class="btn-circle btn-ghost absolute right-3 top-3"
            icon="o-pencil"
            x-on:click="$wire.isProfileView = false;"
        />
    </div>
    <x-form
        no-separator
        wire:submit="save"
        x-cloak
        x-show="!$wire.isProfileView"
    >
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">
            <div>
                <x-file2
                    accept="image/*"
                    crop-after-change
                    hideProgress
                    wire:model="avatarToUpload"
                >
                    <img
                        class="size-40 rounded-full object-cover"
                        src="{{ $user->avatar ? '/storage/' . $user->avatar : '/empty-user.jpg' }}"
                    />
                </x-file2>
                <x-loading
                    wire:loading
                    wire:target="avatarToUpload"
                />
            </div>
            <div class="col-span-3 space-y-3">
                <x-input
                    label="Imię i nazwisko"
                    placeholder="Jan Kowalski"
                    wire:model="name"
                />
                <x-input
                    label="Adres e-mail"
                    placeholder="example@gmail.com"
                    wire:model="email"
                />
                <x-password
                    label="Hasło"
                    placeholder="Bezpieczne hasło"
                    right
                    wire:model="password"
                />
                <x-password
                    label="Potwierdź hasło"
                    placeholder="Bezpieczne hasło"
                    right
                    wire:model="passwordConfirmation"
                />
                <x-tags
                    hint="Wciśnij Enter aby dodać link"
                    icon="o-link"
                    label="Linki"
                    wire:model="links"
                />
            </div>
        </div>
        <div>
            <x-markdown
                :config="config('clickforjob.easeMDEConfig')"
                label="Treść zapytania"
                wire:model="content"
            />
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
        </div>
        <x-button
            class="btn-circle btn-ghost absolute right-3 top-3"
            icon="o-user"
            x-on:click="$wire.isProfileView = true"
        />
        <x-slot:actions>
            <div class="mt-3 space-x-3">
                <x-button
                    label="Anuluj"
                    x-on:click="$wire.isProfileView = true"
                />
                <x-button
                    class="btn-primary"
                    label="Zapisz"
                    spinner="save"
                    type="submit"
                    wire:loading.class="bg-gray pointer-events-none"
                    wire:target="avatarToUpload, cvToUpload"
                />
            </div>
        </x-slot:actions>
    </x-form>
</section>
