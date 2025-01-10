<div x-on:open-register-modal.window="$wire.modal = true">
    <x-menu-item
        x-on:click="$wire.modal = true"
        class="text-lg"
        title="Zarejestruj się"
    />
    @teleport('body')
        <x-modal
            title="Rejestracja"
            subtitle="Nie zwlekaj, zarejestruj się już dzisiaj."
            wire:model="modal"
        >
            <div>
                <x-form wire:submit="register">
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
                    <x-radio
                        label="Rejestruj się jako"
                        :options="$roleCases"
                        wire:model="role"
                    />
                    <x-button
                        class="btn-primary mt-4"
                        label="Zarejestruj się"
                        spinner="register"
                        type="submit"
                    />
                    <div>
                        Masz już konto?
                        <a
                            x-on:click="$dispatch('open-login-modal'); $wire.modal = false;"
                            class="text-primary"
                            href="javascript:;"
                        >Zaloguj się</a>
                    </div>
                </x-form>
            </div>
        </x-modal>
    @endteleport
</div>
