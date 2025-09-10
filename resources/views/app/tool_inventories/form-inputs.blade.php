@php $editing = isset($toolInventory) @endphp

<style>
    .ts-control {
        border: none;
        padding: 0;
    }

    .ts-dropdown,
    .ts-control,
    .ts-control input {
        color: rgb(31 41 55 / var(--tw-text-opacity));
        font-family: inherit;
        font-size: 1rem;
        line-height: 1.5;
    }
</style>

<x-partials.card>
    {{--
    <x-slot name="title">
        <span>@lang('card.title')</span>
    </x-slot>
    --}}

    <div class="flex flex-wrap">
        <x-inputs.group class="w-full">
            <x-inputs.text
                name="name"
                :value="old('name', ($editing ? $toolInventory->name : ''))"
                label="{{ __('crud.tool_inventories.inputs.name') }}"
                placeholder="{{ __('crud.tool_inventories.inputs.name') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.date
                name="purchase_date"
                value="{{ old('purchase_date', ($editing ? optional($toolInventory->purchase_date)->format('Y-m-d') : '')) }}"
                label="{{ __('crud.tool_inventories.inputs.purchase_date') }}"
                placeholder="{{ __('crud.tool_inventories.inputs.purchase_date') }}"
                max="255"
                required
            ></x-inputs.date>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.slider
                name="purchase_price"
                :value="old('purchase_price', ($editing ? $toolInventory->purchase_price : ''))"
                label="{{ __('crud.tool_inventories.inputs.purchase_price') }}"
                placeholder="{{ __('crud.tool_inventories.inputs.purchase_price') }}"
                max="255"
                step="0.01"
                required
            ></x-inputs.slider>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="location_store"
                :value="old('location_store', ($editing ? $toolInventory->location_store : ''))"
                label="{{ __('crud.tool_inventories.inputs.location_store') }}"
                placeholder="{{ __('crud.tool_inventories.inputs.location_store') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.slider
                name="quantity"
                :value="old('quantity', ($editing ? $toolInventory->quantity : ''))"
                label="{{ __('crud.tool_inventories.inputs.quantity') }}"
                placeholder="{{ __('crud.tool_inventories.inputs.quantity') }}"
                max="255"
                required
            ></x-inputs.slider>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="status"
                :value="old('status', ($editing ? $toolInventory->status : ''))"
                label="{{ __('crud.tool_inventories.inputs.status') }}"
                placeholder="{{ __('crud.tool_inventories.inputs.status') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="picture"
                :value="old('picture', ($editing ? $toolInventory->picture : ''))"
                label="{{ __('crud.tool_inventories.inputs.picture') }}"
                placeholder="{{ __('crud.tool_inventories.inputs.picture') }}"
                maxlength="255"
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.textarea
                name="notes"
                label="{{ __('crud.tool_inventories.inputs.notes') }}"
                placeholder="{{ __('crud.tool_inventories.inputs.notes') }}"
                maxlength="255"
                required
            >
                {{ old('notes', ($editing ? $toolInventory->notes : '')) }}
            </x-inputs.textarea>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.tomselect
                name="tool_category_id"
                label="{{ __('crud.tool_inventories.inputs.tool_category_id') }}"
                required
            >
                @php $selected = old('tool_category_id', ($editing ? $toolInventory->tool_category_id : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Tool Category</option>
                @foreach($toolCategories as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                @endforeach
            </x-inputs.tomselect>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.tomselect
                name="created_by"
                label="{{ __('crud.tool_inventories.inputs.created_by') }}"
                required
            >
                @php $selected = old('created_by', ($editing ? $toolInventory->created_by : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
                @foreach($users as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                @endforeach
            </x-inputs.tomselect>
        </x-inputs.group>
    </div>
</x-partials.card>
