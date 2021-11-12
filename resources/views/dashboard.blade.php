<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <section class="py-4 max-w-4xl mx-auto">
        <td class="py-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <aside class="px-6 py-6 whitespace-nowrap text-left text-m font-medium text-indigo-600 hover:text-indigo-900">
                            <table class="text">
                                <tr>
                                    <td class="py-8 max-w-4xl mx-auto">
                                        <button type="submit" onclick="window.location='{{ route("operations.income") }}'"  name="cancel"
                                                class="bg-blue-400 text-white rounded py-40 px-40 hover:bg-blue-500"
                                        >
                                            All Incomes
                                        </button>
                                    </td>
                                    <td class="py-8 max-w-4xl mx-auto">
                                        <button type="submit" onclick="window.location='{{ route("operations.expenditure") }}'"  name="cancel"
                                                class="bg-blue-400 text-white rounded py-40 px-40 hover:bg-blue-500"
                                        >
                                            All Expenditures
                                        </button>
                                    </td>
                                </tr>
                            </table>
                            <table class="text">
                                <tr>
                                    <td class="py-8 max-w-4xl mx-auto">
                                        <button type="submit" onclick="window.location='{{ route("target") }}'"  name="cancel"
                                                class="bg-blue-400 text-white rounded py-40 px-40 hover:bg-blue-500"
                                        >
                                            Your Tagrets
                                        </button>
                                    </td>
                                    <td class="py-8 max-w-4xl mx-auto">
                                        <button type="submit" onclick="window.location='{{ route("dashboard") }}'"  name="cancel"
                                                class="bg-blue-800 text-white rounded py-40 px-40 hover:bg-blue-500"
                                        >
                                            Your Cashflow
                                        </button>
                                    </td>
                                </tr>
                            </table>
{{--                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">--}}
{{--                            <table class="min-w-full divide-y divide-gray-200">--}}
{{--                                <thead class="bg-gray-50">--}}
{{--                                <tr>--}}
{{--                                    <th scope="col"--}}
{{--                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                        Year--}}
{{--                                    </th>--}}
{{--                                    <th scope="col"--}}
{{--                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                        Incomes--}}
{{--                                    </th>--}}
{{--                                    <th scope="col"--}}
{{--                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                        Expenditures--}}
{{--                                    </th>--}}
{{--                                    <th scope="col"--}}
{{--                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                        Potential--}}
{{--                                    </th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody class="bg-white divide-y divide-gray-200">--}}
{{--                                @foreach ($incomes as $income)--}}
{{--                                    <tr>--}}
{{--                                        <td class="px-6 py-4 whitespace-nowrap">--}}
{{--                                            <div class="flex items-center">--}}
{{--                                                <div class="text-sm font-medium text-gray-900">--}}
{{--                                                    {{ $income->id }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">--}}
{{--                                            {{ $income->sum }}--}}
{{--                                        </td>--}}
{{--                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">--}}
{{--                                            {{ $income->date }}--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                            <style>--}}
{{--                                table.text  {--}}
{{--                                    width:  100%;--}}
{{--                                    border-spacing: 0;--}}
{{--                                }--}}
{{--                                table.text td {--}}
{{--                                    width: 50%;--}}
{{--                                    vertical-align: top;--}}
{{--                                }--}}
{{--                                td.rightcol {--}}
{{--                                    text-align: right;--}}
{{--                                }--}}
{{--                            </style>--}}
{{--                            <aside class="px-6 py-6 whitespace-nowrap text-left text-m font-medium text-indigo-600 hover:text-indigo-900">--}}
{{--                                <table class="text">--}}
{{--                                    <tr>--}}
{{--                                        --}}{{--                                        <td>--}}
{{--                                        --}}{{--                                            <a href="/operations/expenditure"--}}
{{--                                        --}}{{--                                               class="{{ request()->is('operations/expenditure') ? 'text-blue-500' : '' }}"><- Go back</a>--}}
{{--                                        --}}{{--                                        </td>--}}

{{--                                        <td class="rightcol">--}}
{{--                                            <a href="/dashboard"--}}
{{--                                               class="{{ request()->is('dashboard') ? 'text-blue-500' : '' }} ">Dashboard -></a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                </table>--}}
{{--                            </aside>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            </div>--}}
        </section>
    </section>
</x-app-layout>
