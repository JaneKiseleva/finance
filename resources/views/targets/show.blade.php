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
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Target current cost
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Planned date
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Estimated time to reach
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($targets as $target)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $target->name }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $target->target_current_cost }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $target->planned_date }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $target->estimated_time_to_reach }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <style>
                                table.text {
                                    width: 100%;
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
                            <aside
                                class="px-6 py-6 whitespace-nowrap text-left text-m font-medium text-indigo-600 hover:text-indigo-900">
                                <table class="text">
                                    <tr>
                                        <td class="rightcol">
                                            <a href="/dashboard"
                                               class="{{ request()->is('dashboard') ? 'text-blue-500' : '' }} ">Dashboard
                                                -></a>
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

