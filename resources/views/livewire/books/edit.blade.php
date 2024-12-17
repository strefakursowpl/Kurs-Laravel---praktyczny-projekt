<form wire:submit="update" class="space-y-3 p-3">
    <div>
        <input class="border rounded-md p-2" name="title" placeholder="Tytuł książki" wire:model="title" />
    </div>
    @error('title')
        <div style="margin-top: 10px; color: red;">{{ $message }}</div>
    @enderror
    <div>
        <input class="border rounded-md p-2" name="author" placeholder="Autor książki" wire:model="author" />
    </div>
    @error('author')
        <div style="margin-top: 10px; color: red;">{{ $message }}</div>
    @enderror
    <input type="submit" value="Wyślij" class="bg-green-500 text-white p-4" wire:loading.class="opacity-50" wire:loading.attr="disabled" />
</form>
