<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Targets') }}
        </h2>
    </x-slot>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        {{ $targets->count() }}
    </main>
</x-app-layout>
