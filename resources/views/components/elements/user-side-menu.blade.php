@php
    $user = auth()->user();
@endphp
<div class="border-light-gray lg:border rounded-2xl py-4 lg:px-4 side-menu">
    <div class="text-lg font-bold lg:hidden">
        Menu użytkownika
    </div>
    @if ($user)
        @if($user->role === \App\Enums\Role::USER)
            <x-menu activate-by-route>
                <x-menu-item icon="o-envelope" title="Zapytania o pracę" link="/inquiries" />
                <x-menu-item icon="o-heart" title="Ulubione" link="/favorites" />
                <x-menu-item icon="o-user" title="Profil" link="/profile" />
                <x-menu-item icon="o-power" title="Wyloguj się" link="/logout" />
            </x-menu>
        @elseif($user->role === \App\Enums\Role::EMPLOYER)
            <x-menu activate-by-route>
                <x-menu-item icon="o-plus" title="Dodaj ofertę" link="/jobs/create" route="jobs.create" />
                <x-menu-item icon="o-document-check" title="Moje oferty" link="/jobs" route="jobs" />
                <x-menu-item icon="o-user" title="Profil" link="/profile" />
                <x-menu-item icon="o-power" title="Wyloguj się" link="/logout" />
            </x-menu>
        @endif
    @else
        <x-menu activate-by-route>
            <x-menu-item icon="o-paper-airplane" title="Zaloguj się" link="/test" />
            <x-menu-item icon="o-user-plus" title="Zarejestruj się" link="/test123" />
        </x-menu>
    @endif
</div>
