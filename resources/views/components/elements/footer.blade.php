<footer>
    <div class="container pb-24">
        <div class="grid grid-cols-1 xl:grid-cols-[1fr_2fr] gap-20">
            <div>
                <x-ui.logo footer class="pb-12 block" />
                <p class="text-light-gray">
                    W CLICKFORJOB czekają na Ciebie tysiące ofert z różnych branż czy lokalizacji. Nie zwlekaj, kliknij już teraz aby
                    znaleźć nową ekscytującą pracę.
                </p>
            </div>
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-5">
                <div class="space-y-2">
                    <h4 class="text-2xl text-gray mb-8">Dla kandydatów</h4>
                    <a href="/" class="text-xl text-light-gray block hover:text-primary" wire:navigate>Profil kandydata</a>
                    <a href="/" class="text-xl text-light-gray block hover:text-primary" wire:navigate>Oferty pracy</a>
                    <a href="/" class="text-xl text-light-gray block hover:text-primary" wire:navigate>Nasi pracodawcy</a>
                </div>
                <div class="space-y-2">
                    <h4 class="text-2xl text-gray mb-8">Dla firm</h4>
                    <a href="/" class="text-xl text-light-gray block hover:text-primary" wire:navigate>Konto pracodawcy</a>
                    <a href="/" class="text-xl text-light-gray block hover:text-primary" wire:navigate>Dodaj ogłoszenie</a>
                    <a href="/" class="text-xl text-light-gray block hover:text-primary" wire:navigate>Nowości rekrutacyjne</a>
                </div>
                <div class="space-y-2">
                    <h4 class="text-2xl text-gray mb-8">O nas</h4>
                    <a href="/" class="text-xl text-light-gray block hover:text-primary" wire:navigate>O nas</a>
                    <a href="/" class="text-xl text-light-gray block hover:text-primary" wire:navigate>Kontakty</a>
                    <a href="/" class="text-xl text-light-gray block hover:text-primary" wire:navigate>Partnerzy</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-silver py-10">
        <div class="container flex justify-between">
            <a href="/" class="text-light-gray text-xl hover:text-primary" wire:navigate>
                @ CLICKFORJOB
            </a>
            <div class="flex gap-7">
                <a href="/" target="_blank">
                    <x-icon name="bi.instagram" class="text-light-gray hover:text-primary" />
                </a>
                <a href="/" target="_blank">
                    <x-icon name="bi.twitter-x" class="text-light-gray hover:text-primary" />
                </a>
                <a href="/" target="_blank">
                    <x-icon name="bi.facebook" class="text-light-gray hover:text-primary" />
                </a>
            </div>
        </div>
    </div>
</footer>
