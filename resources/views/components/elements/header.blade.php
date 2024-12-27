<div class="relative z-40">
    {{ $baner }}
    <div class="container top-0 left-1/2 -translate-x-1/2 absolute w-full px-4 lg:px-8 pt-6 flex flex-col justify-between h-full">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-5 lg:mb-0">
            <x-ui.logo />
            <div class="hidden lg:block">
                MENU
            </div>
        </div>
        {{$slot}}
    </div>
</div>
