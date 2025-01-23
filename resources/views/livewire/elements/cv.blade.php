<div
    wire:click="download"
    x-on:click="$dispatch('cv-downloaded')"
    class="cursor-pointer mt-5 rounded-xl border border-light-gray p-6 flex items-center gap-5 hover:bg-silver"
>
    <x-icon name="o-document" class="h-12 w-12" />
    <div class="text-gray text-xl font-light break-words">
        {{ $fileName }}
    </div>
</div>
