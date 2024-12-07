@props(['title', 'author'])
<div {{ $attributes->merge(['class' => 'rounded-md bg-white shadow p-2']) }}>
	<h2 class="font-bold">
		{{ $title }}
	</h2>
	<p class="italic">{{ $author }}</p>
</div>
