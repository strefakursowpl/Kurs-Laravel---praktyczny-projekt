<x-layout>
	<x-slot:header>
		<h1>Książki</h1>
	</x-slot:header>
	<div class="grid grid-cols-3 gap-3 bg-gray-500 p-5">
		@foreach ($books as $book)
			<x-books.item
				:author="$book->author"
				:title="$book->title"
			/>
		@endforeach
	</div>
	<div class="py-3 text-center">
		@php
			$type = 'success';
		@endphp
		<x-button
			:$type
			class="font-bold"
			disabled
		>
			Zobacz więcej
		</x-button>
	</div>
	<x-slot:footer>
		<div>
			<ul>
				<li>1</li>
				<li>2</li>
				<li>3</li>
			</ul>
		</div>
	</x-slot:footer>
</x-layout>
