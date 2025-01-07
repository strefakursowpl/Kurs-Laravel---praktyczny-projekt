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
            <livewire:jobs.job-search />
        </div>
    </x-elements.header>

    <x-elements.navbar />

    <x-main2>
        <x-slot:sidebar drawer="main-drawer" class="bg-white lg:bg-inherit px-4 lg:pl-0 lg:pr-4">
            <div class="block lg:hidden">
                <x-elements.user-side-menu />
            </div>
            <livewire:jobs.job-filters />
        </x-slot:sidebar>
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main2>
    <x-elements.footer />

    <x-toast />
</body>
</html>
