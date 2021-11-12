<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Finance') }}
        </h2>
    </x-slot>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-170 border border-gray-300 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Здесь сделать список доходов</h1>

            <form method="POST" action="/finance/" class="mt-10">
                @csrf

                {{--Name--}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="name"
                    >
                        Name
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           text="type"
                           name="name"
                           id="name"
                           value="{{ old('name') }}"
                           required
                    >

                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{--Sum--}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="sum"
                    >
                        Sum
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           text="type"
                           name="sum"
                           id="sum"
                           value="{{ old('sum') }}"
                           required
                    >

                    @error('sum')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{--Period--}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="period"
                    >
                        Period
                    </label>

                    <select class="border border-gray-400 p-2 w-full" id="period" name="period">
                        <option value="{{ old('one-time') }}">one-time</option>
                        <option value="{{ old('monthly') }}">monthly</option>
                    </select>


                    @error('period')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{--Description--}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="description"
                    >
                        Description
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="description"
                           id="description"
                           required
                    >

                    @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{--Buttons--}}
                <div class="mb-6">
                    {{--ButtonSave--}}
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Save
                    </button>

                    {{--ButtonCancel--}}
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Cancel
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-app-layout>


{{--        --}}{{--ButtonNext--}}
{{--        <div class="mb-6 ">--}}
{{--        <button type="submit"--}}
{{--                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"--}}
{{--        >--}}
{{--            Next--}}
{{--        </button>--}}
{{--        </div>--}}


{{--    <!-- Navigation Links -->--}}
{{--    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">--}}
{{--        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </x-nav-link>--}}

{{--        <x-nav-link :href="route('profile')" :active="request()->routeIs('profile')">--}}
{{--            {{ __('Profile') }}--}}
{{--        </x-nav-link>--}}
{{--    </div>--}}

