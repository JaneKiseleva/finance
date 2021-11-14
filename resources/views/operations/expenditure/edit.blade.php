<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expenditures') }}
        </h2>
        <aside class="w-48 flex-shrink-0">
            <ul>
                <li>
                    <a href="/operations/expenditures"
                       class="{{ request()->is('operations/expenditures') ? 'text-blue-500' : '' }}">All
                        Expenditures</a>
                </li>

                <li>
                    <a href="/operations/expenditure"
                       class="{{ request()->is('operations/expenditure') ? 'text-blue-500' : '' }}">Edit Expenditure</a>
                </li>

                <li>
                    <a href="/operations/expenditure/create"
                       class="{{ request()->is('operations/expenditure/create') ? 'text-blue-500' : '' }}">New
                        Expenditure</a>
                </li>
            </ul>
        </aside>
    </x-slot>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-170 border border-gray-300 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Edit expenditure</h1>

            <form method="POST" action="/operations/expenditure/{{ $operation->id }}" class="mt-10">
                @csrf
                @method('PATCH')
                {{--Name--}}
                <div class="mt-4">
                    <x-label for="name" :value="__('Name')"/>

                    <x-input id="name" class="block mt-1 w-full"
                             type="text"
                             name="name"
                             value="{{ $operation->name }}"
                             required/>
                </div>


                {{--Sum--}}
                <div class="mt-4">
                    <x-label for="sum" :value="__('Sum')"/>

                    <x-input id="sum" class="block mt-1 w-full"
                             type="text"
                             name="sum"
                             value="{{ $operation->sum }}"
                             required/>
                </div>

                {{--Period--}}
                <div class="mt-4">
                    <x-label for="period" :value="__('Period')"/>

                    <div class="form-text-container">
                        <select name="period"
                                id="period"
                                value="{{ $operation->period }}"
                                class="form-select block mt-1 w-full text-gray-500 border rounded-md shadow-sm border-gray-300
                            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        >
                            <option value="one-time">one-time</option>
                            <option value="monthly">monthly</option>
                        </select>
                    </div>
                </div>


                {{--Description--}}
                <div class="mt-4">
                    <x-label for="description" :value="__('Description')"/>

                    <x-input id="description" class="block mt-1 w-full"
                             type="text"
                             name="description"
                             value="{{ $operation->description }}"
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
                <button type="submit" onclick="window.location='{{ route("operations.expenditure") }}'" name="cancel"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                >
                    Cancel
                </button>
            </td>
        </main>
    </section>
</x-app-layout>

