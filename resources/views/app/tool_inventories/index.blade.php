<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.tool_inventories.index_title')
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
                            @can('create', App\Models\ToolInventory::class)
                            <a
                                href="{{ route('tool-inventories.create') }}"
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
                                    @lang('crud.tool_inventories.inputs.name')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_inventories.inputs.purchase_date')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.tool_inventories.inputs.purchase_price')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_inventories.inputs.location_store')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.tool_inventories.inputs.quantity')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_inventories.inputs.status')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_inventories.inputs.picture')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_inventories.inputs.notes')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_inventories.inputs.tool_category_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.tool_inventories.inputs.created_by')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($toolInventories as $toolInventory)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    {{ $toolInventory->name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{
                                    optional($toolInventory->purchase_date)->format('D,
                                    d M Y') }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $toolInventory->purchase_price ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $toolInventory->location_store ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $toolInventory->quantity ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $toolInventory->status ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $toolInventory->picture ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $toolInventory->notes ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{
                                    optional($toolInventory->toolCategory)->name
                                    ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($toolInventory->createdBy)->name
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
                                        @can('update', $toolInventory)
                                        <a
                                            href="{{ route('tool-inventories.edit', $toolInventory) }}"
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
                                        @endcan @can('view', $toolInventory)
                                        <a
                                            href="{{ route('tool-inventories.show', $toolInventory) }}"
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
                                <td colspan="11">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="11">
                                    <div class="mt-10 px-4">
                                        {!! $toolInventories->render() !!}
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
