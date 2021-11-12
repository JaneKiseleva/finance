@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>

{{--@props(['name'])--}}

{{--<label class="'block font-medium text-sm text-gray-700'"--}}
{{--       {{ $name ?? $slot }}"--}}
{{-->--}}
{{--    {{ ucwords($name) }}--}}
{{--</label>--}}


