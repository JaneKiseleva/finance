<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expenditures') }}
        </h2>
        <aside class="w-48 flex-shrink-0">
            <ul>
                <li>
                    <a href="/operations/expenditures"
                       class="{{ request()->is('operations/expenditures') ? 'text-blue-500' : '' }}">All Expenditures</a>
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
    <section class="py-8 max-w-4xl mx-auto">
        <section class="py-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Id
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Sum
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($expenditures as $expenditure)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $expenditure->id }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $expenditure->sum }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $expenditure->date }}
                                        </td>
                                        {{--                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">--}}
                                        {{--                                            <a href="/operations/income/{{ $operation->id }}/edit"--}}
                                        {{--                                               class="text-indigo-600 hover:text-indigo-900">Edit</a>--}}
                                        {{--                                        </td>--}}
                                        {{--                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">--}}
                                        {{--                                            <form method="POST" action="/operations/income/{{ $operation->id }}">--}}
                                        {{--                                                @csrf--}}
                                        {{--                                                @method('DELETE')--}}
                                        {{--                                                <button class="text-indigo-600 hover:text-indigo-900">Delete--}}
                                        {{--                                                </button>--}}
                                        {{--                                            </form>--}}
                                        {{--                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <style>
                                table.text  {
                                    width:  100%;
                                    border-spacing: 0;
                                }
                                table.text td {
                                    width: 50%;
                                    vertical-align: top;
                                }
                                td.rightcol {
                                    text-align: right;
                                }
                            </style>
                            <aside class="px-6 py-6 whitespace-nowrap text-left text-m font-medium text-indigo-600 hover:text-indigo-900">
                                <table class="text">
                                    <tr>
{{--                                        <td>--}}
{{--                                            <a href="/operations/expenditure"--}}
{{--                                               class="{{ request()->is('operations/expenditure') ? 'text-blue-500' : '' }}"><- Go back</a>--}}
{{--                                        </td>--}}

                                        <td class="rightcol">
                                            <a href="/dashboard"
                                               class="{{ request()->is('dashboard') ? 'text-blue-500' : '' }} ">Dashboard -></a>
                                        </td>
                                    </tr>
                                </table>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </section>
</x-app-layout>
