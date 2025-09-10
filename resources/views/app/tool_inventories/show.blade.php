<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="javascript: history.go(-1)" class="mr-4">
                <i class="mr-1 icon ion-md-arrow-back"></i>
            </a>
            @lang('crud.tool_inventories.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                {{--
                <x-slot name="title">
                    <span>@lang('card.title')</span>
                </x-slot>
                --}}

                <div class="flex flex-wrap mt-2 px-4">
                    <div class="mb-4 w-full">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.tool_inventories.inputs.name')
                        </h5>
                        <span> {{ $toolInventory->name ?? '-' }} </span>
                    </div>
                    <div class="mb-4 w-full">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.tool_inventories.inputs.purchase_date')
                        </h5>
                        <span>
                            {{
                            optional($toolInventory->purchase_date)->format('l,
                            d F Y') }}
                        </span>
                    </div>
                    <div class="mb-4 w-full">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.tool_inventories.inputs.purchase_price')
                        </h5>
                        <span>
                            {{ $toolInventory->purchase_price ?? '-' }}
                        </span>
                    </div>
                    <div class="mb-4 w-full">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.tool_inventories.inputs.location_store')
                        </h5>
                        <span>
                            {{ $toolInventory->location_store ?? '-' }}
                        </span>
                    </div>
                    <div class="mb-4 w-full">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.tool_inventories.inputs.quantity')
                        </h5>
                        <span> {{ $toolInventory->quantity ?? '-' }} </span>
                    </div>
                    <div class="mb-4 w-full">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.tool_inventories.inputs.status')
                        </h5>
                        <span> {{ $toolInventory->status ?? '-' }} </span>
                    </div>
                    <div class="mb-4 w-full">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.tool_inventories.inputs.picture')
                        </h5>
                        <span> {{ $toolInventory->picture ?? '-' }} </span>
                    </div>
                    <div class="mb-4 w-full">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.tool_inventories.inputs.notes')
                        </h5>
                        <span> {{ $toolInventory->notes ?? '-' }} </span>
                    </div>
                    <div class="mb-4 w-full">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.tool_inventories.inputs.tool_category_id')
                        </h5>
                        <span>
                            {{ optional($toolInventory->toolCategory)->name ??
                            '-' }}
                        </span>
                    </div>
                    <div class="mb-4 w-full">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.tool_inventories.inputs.created_by')
                        </h5>
                        <span>
                            {{ optional($toolInventory->createdBy)->name ?? '-'
                            }}
                        </span>
                    </div>
                </div>
            </x-partials.card>

            <x-partials.card class="mt-5">
                <x-slot name="title">
                    <span>@lang('text.actions')</span>
                </x-slot>
                <div class="mt-4 px-4">
                    <a
                        href="{{ route('tool-inventories.index') }}"
                        class="button"
                    >
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('update', $toolInventory)
                    <a
                        href="{{ route('tool-inventories.edit', $toolInventory) }}"
                        class="button"
                    >
                        <i class="mr-1 icon ion-md-create"></i>
                        @lang('crud.common.edit')
                    </a>
                    @endcan @can('delete', $toolInventory)
                    <div class="float-right">
                        <form
                            action="{{ route('tool-inventories.destroy', $toolInventory) }}"
                            method="POST"
                            onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                        >
                            @csrf @method('DELETE')
                            <button type="submit" class="button">
                                <i class="mr-1 icon ion-md-trash text-red-600">
                                </i>
                                <span class="text-red-600">
                                    @lang('crud.common.delete')
                                </span>
                            </button>
                        </form>
                    </div>
                    @endcan
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
