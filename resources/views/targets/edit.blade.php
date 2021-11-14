<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Targets') }}
        </h2>
        <aside class="w-48 flex-shrink-0">
            <ul class="col2">
                <li>
                    <a href="/targets"
                       class="{{ request()->is('targets') ? 'text-blue-500' : '' }}">All Targets</a>
                </li>

                <li>
                    <a href="/target"
                       class="{{ request()->is('target') ? 'text-blue-500' : '' }}">Edit Target</a>
                </li>

                <li>
                    <a href="/target/create"
                       class="{{ request()->is('target/create') ? 'text-blue-500' : '' }}">New
                        Target</a>
                </li>
            </ul>
        </aside>
    </x-slot>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-170 border border-gray-300 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Edit target</h1>

            <form method="POST" action="/target/{{ $target->id }}" class="mt-10">
                @csrf
                @method('PATCH')

                {{--Name--}}
                <div class="mt-4">
                    <x-label for="name" :value="__('Name')"/>

                    <x-input id="name" class="block mt-1 w-full"
                             type="text"
                             name="name"
                             value="{{ $target->name }}"
                             required/>
                </div>

                {{--Target_current_cost--}}
                <div class="mt-4">
                    <x-label for="target_current_cost" :value="__('Target current cost')"/>

                    <x-input id="target_current_cost" class="block mt-1 w-full"
                             type="text"
                             name="target_current_cost"
                             value="{{ $target->target_current_cost }}"
                             required/>
                </div>

                {{--Planned_date--}}
                <div class="mt-4">
                    <x-label for="planned_date" :value="__('Planned date')"/>

                    <x-input id="planned_date" class="block mt-1 w-full"
                             type="date"
                             name="planned_date"
                             value="{{ $target->planned_date }}"
                             required/>
                </div>

                {{--Description--}}
                <div class="mt-4">
                    <x-label for="description" :value="__('Description')"/>

                    <x-input id="description" class="block mt-1 w-full"
                             type="text"
                             name="description"
                             value="{{ $target->description }}"
                             required/>
                </div>

                {{--Buttons--}}
                <div class="mt-8">
                    {{--ButtonSave--}}
                    <button type="submit" name="update"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Update
                    </button>
                </div>
            </form>
            <br>
            <td>
                {{--ButtonCancel--}}
                <button type="submit" onclick="window.location='{{ route("target") }}'" name="cancel"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                >
                    Cancel
                </button>
            </td>
        </main>
    </section>
</x-app-layout>
