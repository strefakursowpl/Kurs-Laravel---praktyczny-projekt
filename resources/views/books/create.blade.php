<form action="/books" method="POST">
    @csrf
    <input name="title" placeholder="Tytuł książki" value="{{ old('title') }}" />
    @error('title')
        <div style="margin-top: 10px; color: red;">{{ $message }}</div>
    @enderror
    <input name="author" placeholder="Autor książki" value="{{ old('author') }}" />
    @error('author')
        <div style="margin-top: 10px; color: red;">{{ $message }}</div>
    @enderror
    <input type="submit" value="Wyślij" />
</form>
