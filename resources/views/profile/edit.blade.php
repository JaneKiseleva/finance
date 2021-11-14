<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-170 border border-gray-300 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Settings</h1>

            <form method="POST" action="/profile/{{$user->id}}" class="mt-10">
                @csrf
                @method('PATCH')

                {{--Name--}}
                <div class="mt-4">
                    <x-label for="name" :value="__('Name')"/>

                    <x-input id="name" class="block mt-1 w-full"
                             type="text"
                             name="name"
                             value="{{ $user->name }}"
                             required/>
                </div>

                {{--Email--}}
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')"/>

                    <x-input id="email" class="block mt-1 w-full"
                             type="email"
                             name="email"
                             value="{{ $user->email}}"
                             required/>
                </div>

                {{--Birthday--}}
                <div class="mt-4">
                    <x-label for="birthday" :value="__('Birthday')"/>

                    <x-input id="birthday" class="block mt-1 w-full"
                             type="date"
                             name="birthday"
                             value="{{ $user->birthday}}"
                             required/>
                </div>

                {{-- Change Password--}}
                <div class="mt-4">
                    {{--Confirm Password--}}
                    <div class="mt-8">
                        <a href="/profile/{{ $user->id }}/change"
                           class=" bg-blue-800 text-white rounded py-2 px-4 {{ request()->is('profile.change-password') ? 'text-blue-500' : '' }}">Change
                            password</a>
                        </td>
                    </div>
                </div>

                {{--Buttons--}}
                <div class="mt-8">
                    {{--ButtonSave--}}
                    <button type="submit" name="update"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Update
                    </button>

                    {{--ButtonCancel--}}
                    <button type="submit" onclick="window.location='{{ route("profile") }}'"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Cancel
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-app-layout>
