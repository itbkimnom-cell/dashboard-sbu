<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.tool_loans.index_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <div class="mb-5 mt-4">
                    <div class="flex flex-wrap justify-between">
                        <div class="md:w-1/2">
                            <form>
                                <div class="flex items-center w-full">
                                    <x-inputs.text
                                        name="search"
                                        value="{{ $search ?? '' }}"
                                        placeholder="{{ __('crud.common.search') }}"
                                        autocomplete="off"
                                    ></x-inputs.text>

                                    <div class="ml-1">
                                        <button
                                            type="submit"
                                            class="button button-primary"
                                        >
                                            <i class="icon ion-md-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="md:w-1/2 text-right">
                            @can('create', App\Models\ToolLoan::class)
                            <a
                                href="{{ route('tool-loans.create') }}"
                                class="button button-primary"
                            >
                                <i class="mr-1 icon ion-md-add"></i>
                                @lang('crud.common.create')
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="block w-full overflow-auto scrolling-touch">
                    <table class="w-full max-w-full mb-4 bg-transparent">
                        <thead class="text-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_loans.inputs.start_loan_date')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_loans.inputs.end_loan_date')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_loans.inputs.return_date')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.tool_loans.inputs.quantity')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_loans.inputs.condition_out')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_loans.inputs.condition_in')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_loans.inputs.status')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_loans.inputs.notes')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_loans.inputs.tool_inventory_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_loans.inputs.borrowed_by')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_loans.inputs.approved_borrowed_by')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_loans.inputs.approved_returned_by')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($toolLoans as $toolLoan)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    {{
                                    optional($toolLoan->start_loan_date)->format('D,
                                    d M Y') }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{
                                    optional($toolLoan->end_loan_date)->format('D,
                                    d M Y') }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{
                                    optional($toolLoan->return_date)->format('D,
                                    d M Y') }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $toolLoan->quantity ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $toolLoan->condition_out ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $toolLoan->condition_in ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $toolLoan->status ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $toolLoan->notes ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($toolLoan->toolInventory)->name
                                    ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($toolLoan->borrowedBy)->name ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{
                                    optional($toolLoan->approvedBorrowedBy)->name
                                    ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{
                                    optional($toolLoan->approvedReturnedBy)->name
                                    ?? '-' }}
                                </td>
                                <td
                                    class="px-4 py-3 text-center"
                                    style="width: 134px;"
                                >
                                    <div
                                        role="group"
                                        aria-label="Row Actions"
                                        class="
                                            relative
                                            inline-flex
                                            align-middle
                                        "
                                    >
                                        @can('update', $toolLoan)
                                        <a
                                            href="{{ route('tool-loans.edit', $toolLoan) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i
                                                    class="icon ion-md-create"
                                                ></i>
                                            </button>
                                        </a>
                                        @endcan @can('view', $toolLoan)
                                        <a
                                            href="{{ route('tool-loans.show', $toolLoan) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="13">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="13">
                                    <div class="mt-10 px-4">
                                        {!! $toolLoans->render() !!}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
