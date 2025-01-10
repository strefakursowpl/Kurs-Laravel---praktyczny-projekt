@php
    $user = auth()->user();
@endphp
<div class="min-w-[220px] translate-x-6">
    @if ($user)
    <div class="lg:flex">
        <div class="hidden lg:block">
            <livewire:ui.user-avatar :avatarUrl="$user->avatar" />
        </div>
        @if($user->role === \App\Enums\Role::USER)
            <x-dropdown label="Moje konto" class="bg-transparent hover:bg-transparent border-0 text-xl shadow-none font-medium !pr-0 [&_svg]:size-7">
                <x-menu-item title="Zapytania o pracę" link="/inquiries" />
                <x-menu-item title="Ulubione" link="/favorites" />
                <x-menu-item title="Profil" link="/profile" />
                <x-menu-item title="Wyloguj się" link="/logout" />
            </x-dropdown>
        @elseif($user->role === \App\Enums\Role::EMPLOYER)
            <x-dropdown label="Moje konto" class="bg-transparent hover:bg-transparent border-0 text-xl shadow-none font-medium !pr-0 [&_svg]:size-7">
                <x-menu-item title="Dodaj ofertę" link="/jobs/create" />
                <x-menu-item title="Moje oferty" link="/jobs" />
                <x-menu-item title="Profil" link="/profile" />
                <x-menu-item title="Wyloguj się" link="/logout" />
            </x-dropdown>
        @endif
    </div>
    @else
        <x-dropdown label="Zaloguj się" class="bg-transparent hover:bg-transparent border-0 text-xl shadow-none font-medium !pr-0 [&_svg]:size-7">
            <livewire:login />
            <livewire:register />
        </x-dropdown>
    @endif
</div>
