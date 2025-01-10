<div x-on:open-login-modal.window="$wire.modal = true">
    <x-menu-item
        x-on:click="$wire.modal = true"
        class="text-lg"
        title="Zaloguj się"
    />
    @teleport('body')
        <x-modal
            subtitle="Zaloguj się i znajdź pracę dla siebie. Kliknij po lepszą przyszłość."
            title="Witaj ponownie!"
            wire:model="modal"
        >
            <div>
                <x-form wire:submit="login">
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
                    <x-button
                        class="btn-primary mt-4"
                        label="Zaloguj się"
                        spinner="login"
                        type="submit"
                    />
                    <div>
                        Nie masz konta?
                        <a
                            x-on:click="$dispatch('open-register-modal'); $wire.modal = false;"
                            class="text-primary"
                            href="javascript:;"
                        >Zarejestruj się teraz</a>
                    </div>
                </x-form>
            </div>
        </x-modal>
    @endteleport
</div>
