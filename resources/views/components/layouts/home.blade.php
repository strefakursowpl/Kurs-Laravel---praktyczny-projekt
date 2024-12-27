<x-elements.head :title="$title ?? config('app.name')" />

<body class="min-h-screen font-sans antialiased bg-white home-layout">

    <x-elements.header>
        <x-slot:baner>
            <img src="/baner.jpg" class="w-full h-[390px] lg:h-full object-cover" width="1920" height="700" />
        </x-slot:baner>
        <div class="text-center hidden lg:block">
            <h1 class="font-bold text-5xl mb-4 text-white">Kliknij i zdobądź pracę!</h1>
            <div class="text-xl font-light text-white">Szukaj pracy gdziekolwiek jesteś...</div>
        </div>
        <div class="pb-20">
            Filtry...
        </div>
    </x-elements.header>

    {{-- NAVBAR mobile only --}}
    <x-nav sticky class="lg:hidden">
        <x-slot:brand>
            <x-app-brand />
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden me-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

            {{-- BRAND --}}
            <x-app-brand class="p-5 pt-3" />

            {{-- MENU --}}
            <x-menu activate-by-route>

                {{-- User --}}
                @if($user = auth()->user())
                    <x-menu-separator />

                    <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                        <x-slot:actions>
                            <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />
                        </x-slot:actions>
                    </x-list-item>

                    <x-menu-separator />
                @endif

                <x-menu-item title="Hello" icon="o-sparkles" link="/" />
                <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-menu-item title="Wifi" icon="o-wifi" link="####" />
                    <x-menu-item title="Archives" icon="o-archive-box" link="####" />
                </x-menu-sub>
            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>
    <x-elements.footer />
    {{--  TOAST area --}}
    <x-toast />
</body>
</html>
