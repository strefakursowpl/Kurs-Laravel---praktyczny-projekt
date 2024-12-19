@props([
    'footer' => false
])

<a href="/" wire:navigate {{$attributes}}>
    @if ($footer)
    <img src="/logo-footer.svg" />
    @else
    <img src="/logo.svg" />
    @endif
</a>
