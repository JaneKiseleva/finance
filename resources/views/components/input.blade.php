@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>


{{--@props(['name'])--}}

{{--Title--}}
{{--<x-field>--}}
{{--    <x-label name="{{ $name }}"/>--}}

{{--    <input class="border border-gray-200 p-2 w-full rounded"--}}
{{--           name="{{ $name }}"--}}
{{--           id="{{ $name }}"--}}
{{--        {{ $attributes(['value'=> old($name)]) }}--}}
{{--    >--}}
{{--    <x-error name="{{ $name }}"/>--}}
{{--</x-field>--}}
