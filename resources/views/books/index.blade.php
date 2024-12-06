@extends('welcome')
@section('header')
    <h1>Książki</h1>
@endsection
@section('content')
    <div class="bg-gray-500 grid grid-cols-3 gap-3 p-5">
        @foreach ($books as $book)
            <div class="rounded-md bg-white shadow p-2">
                <h2 class="font-bold">
                    {{ $book->title }}
                </h2>
                <p class="italic">{{ $book->author }}</p>
            </div>
        @endforeach
    </div>
@endsection
@section('footer')
    <div>
        <ul>
            <li>1</li>
            <li>2</li>
            <li>3</li>
        </ul>
    </div>
@endsection
