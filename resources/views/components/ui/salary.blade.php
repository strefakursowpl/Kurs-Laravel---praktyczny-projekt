@props([
    'salaryFrom' => 0,
    'salaryTo' => 0,
    'small' => false,
])
@php
    $salaryFrom = number_format($salaryFrom, 0, ',', ' ');
    $salaryTo = number_format($salaryTo, 0, ',', ' ');
    $rate = $salaryTo < 1000 ? '/ godz' : '/ msc';
@endphp
<div {{$attributes->class([
    'text-xl lg:text-3xl' => !$small,
    'text-base lg:text-xl' => $small,
])}}>

@if ($salaryFrom === $salaryTo)
    {{$salaryFrom}} zł {{ $rate }}
    @else
    {{$salaryFrom}} - {{$salaryTo}} zł {{ $rate }}
    @endif
</div>
