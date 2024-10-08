<?php

$sortableIcon = '
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3 h-3"><path d="m3 16 4 4 4-4"/><path d="M7 20V4"/><path d="m21 8-4-4-4 4"/><path d="M17 4v16"/></svg>
';

$ascIcon = '
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3 h-3">
    <path d="m3 16 4 4 4-4"/>
    <path d="M7 20V4"/>
    <path d="M11 4h4"/>
    <path d="M11 8h7"/>
    <path d="M11 12h10"/>
</svg>
';

$descIcon = '
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3 h-3">
    <path d="m3 8 4-4 4 4"/>
    <path d="M7 4v16"/>
    <path d="M11 12h4"/>
    <path d="M11 16h7"/>
    <path d="M11 20h10"/>
</svg>
';

?>

@props([
    'name',
])

@php
    $search = request()->query('search');
    $page = request()->query('page');

    $sort_by = request()->query('sort_by');
    $order = request()->query('order');
@endphp

<th
    {{ $attributes->merge(['class' => 'border-r text-left align-middle font-medium']) }}
>
    <form method="get" action="">
        @if ($search)
            <input type="hidden" name="search" value="{{ $search }}" />
        @endif

        <input type="hidden" name="sort_by" value="{{ $name }}" />
        <input
            type="hidden"
            name="order"
            value="{{ $sort_by === $name && $order === 'asc' ? 'desc' : 'asc' }}"
        />
        @if ($page)
            <input type="hidden" name="page" value="{{ $page }}" />
        @endif

        <button
            type="submit"
            {{ $attributes->merge(['class' => 'h-12 px-4 flex items-center space-x-1']) }}
        >
            <span class="flex text-start">{{ $slot }}</span>
            <span>
                @if ($sort_by !== $name)
                    {!! $sortableIcon !!}
                @elseif ($order === 'asc')
                    {!! $ascIcon !!}
                @else
                    {!! $descIcon !!}
                @endif
            </span>
        </button>
    </form>
</th>
