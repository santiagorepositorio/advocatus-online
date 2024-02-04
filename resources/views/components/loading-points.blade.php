@props(['size' => 4, 'color' => 'gray'])


@php
    switch ($size) {
        case 4:
            $width = 'w-4';
            $height = 'h-4';
            $margin = 'mx-2';
            break;
        case 6:
            $width = 'w-6';
            $height = 'h-6';
            $margin = 'mx-3';
            break;
        default:
            $width = 'w-4';
            $height = 'h-4';
            $margin = 'mx-2';
            break;
    }
    switch ($color) {
        case 'gray':
            $bg = 'bg-gray-500';
            break;
        case 'blue':
            $bg = 'bg-blue-500';
            break;
        default:
            $color = 'bg-gray-500';
            break;
    }
@endphp

<div {{$attributes->merge(['class' => 'flex'])}}>
    <div class="{{$width}} {{$height}} rounded-full animate-pulse {{$bg}}"></div>
    <div class="{{$width}} {{$height}} rounded-full animate-pulse {{$bg}} {{$margin}}"></div>
    <div class="{{$width}} {{$height}} rounded-full animate-pulse {{$bg}}"></div>
</div>