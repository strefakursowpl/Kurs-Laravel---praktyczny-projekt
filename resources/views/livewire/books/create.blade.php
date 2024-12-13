<form wire:submit="store">
    <input name="title" placeholder="Tytuł książki" wire:model="title" />
    @error('title')
        <div style="margin-top: 10px; color: red;">{{ $message }}</div>
    @enderror
    <input name="author" placeholder="Autor książki" wire:model="author" />
    @error('author')
        <div style="margin-top: 10px; color: red;">{{ $message }}</div>
    @enderror
    <input type="submit" value="Wyślij" />
</form>
