<div
    wire:click="download"
    class="cursor-pointer mt-5 rounded-xl border border-light-gray p-6 flex items-center gap-5 hover:bg-silver"
>
    <x-icon name="o-document" class="size-12" />
    <div class="text-gray text-xl font-light break-words">
        {{ $fileName }}
    </div>
</div>
