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
                        <aside
                            class="px-6 py-6 whitespace-nowrap text-left text-m font-medium text-indigo-600 hover:text-indigo-900">
                            <table class="text">
                                <tr>
                                    <td class="py-8 max-w-4xl mx-auto">
                                        <button type="submit"
                                                onclick="window.location='{{ route("operations.income") }}'"
                                                name="cancel"
                                                class="bg-blue-400 text-white rounded py-40 px-40 hover:bg-blue-500"
                                        >
                                            All Incomes
                                        </button>
                                    </td>
                                    <td class="py-8 max-w-4xl mx-auto">
                                        <button type="submit"
                                                onclick="window.location='{{ route("operations.expenditure") }}'"
                                                name="cancel"
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
                                        <button type="submit" onclick="window.location='{{ route("target") }}'"
                                                name="cancel"
                                                class="bg-blue-400 text-white rounded py-40 px-40 hover:bg-blue-500"
                                        >
                                            Your Tagrets
                                        </button>
                                    </td>
                                    <td class="py-8 max-w-4xl mx-auto">
                                        <button type="submit" onclick="window.location='{{ route("cashflow") }}'"
                                                name="cancel"
                                                class="bg-blue-800 text-white rounded py-40 px-40 hover:bg-blue-500"
                                        >
                                            Your Cashflow
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </aside>
                    </div>
                </div>
            </div>
    </section>
    </section>
</x-app-layout>
