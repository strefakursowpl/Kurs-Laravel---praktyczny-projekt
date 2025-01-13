@props(['links'])
<div {{ $attributes }}>
	@foreach ($links as $link)
		<x-button
			class="btn-ghost"
			external
			icon="o-link"
			label="{{ $link }}"
			link="{{ $link }}"
		/>
	@endforeach
</div>
