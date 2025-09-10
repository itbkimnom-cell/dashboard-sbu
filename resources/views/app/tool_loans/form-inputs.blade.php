@php $editing = isset($toolLoan) @endphp

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
            <x-inputs.date
                name="start_loan_date"
                value="{{ old('start_loan_date', ($editing ? optional($toolLoan->start_loan_date)->format('Y-m-d') : '')) }}"
                label="{{ __('crud.tool_loans.inputs.start_loan_date') }}"
                placeholder="{{ __('crud.tool_loans.inputs.start_loan_date') }}"
                max="255"
                required
            ></x-inputs.date>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.date
                name="end_loan_date"
                value="{{ old('end_loan_date', ($editing ? optional($toolLoan->end_loan_date)->format('Y-m-d') : '')) }}"
                label="{{ __('crud.tool_loans.inputs.end_loan_date') }}"
                placeholder="{{ __('crud.tool_loans.inputs.end_loan_date') }}"
                max="255"
                required
            ></x-inputs.date>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.date
                name="return_date"
                value="{{ old('return_date', ($editing ? optional($toolLoan->return_date)->format('Y-m-d') : '')) }}"
                label="{{ __('crud.tool_loans.inputs.return_date') }}"
                placeholder="{{ __('crud.tool_loans.inputs.return_date') }}"
                max="255"
                required
            ></x-inputs.date>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.slider
                name="quantity"
                :value="old('quantity', ($editing ? $toolLoan->quantity : ''))"
                label="{{ __('crud.tool_loans.inputs.quantity') }}"
                placeholder="{{ __('crud.tool_loans.inputs.quantity') }}"
                max="255"
                required
            ></x-inputs.slider>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="condition_out"
                :value="old('condition_out', ($editing ? $toolLoan->condition_out : ''))"
                label="{{ __('crud.tool_loans.inputs.condition_out') }}"
                placeholder="{{ __('crud.tool_loans.inputs.condition_out') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="condition_in"
                :value="old('condition_in', ($editing ? $toolLoan->condition_in : ''))"
                label="{{ __('crud.tool_loans.inputs.condition_in') }}"
                placeholder="{{ __('crud.tool_loans.inputs.condition_in') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="status"
                :value="old('status', ($editing ? $toolLoan->status : ''))"
                label="{{ __('crud.tool_loans.inputs.status') }}"
                placeholder="{{ __('crud.tool_loans.inputs.status') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.textarea
                name="notes"
                label="{{ __('crud.tool_loans.inputs.notes') }}"
                placeholder="{{ __('crud.tool_loans.inputs.notes') }}"
                maxlength="255"
            >
                {{ old('notes', ($editing ? $toolLoan->notes : '')) }}
            </x-inputs.textarea>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.tomselect
                name="tool_inventory_id"
                label="{{ __('crud.tool_loans.inputs.tool_inventory_id') }}"
                required
            >
                @php $selected = old('tool_inventory_id', ($editing ? $toolLoan->tool_inventory_id : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Tool Inventory</option>
                @foreach($toolInventories as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                @endforeach
            </x-inputs.tomselect>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.tomselect
                name="borrowed_by"
                label="{{ __('crud.tool_loans.inputs.borrowed_by') }}"
                required
            >
                @php $selected = old('borrowed_by', ($editing ? $toolLoan->borrowed_by : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
                @foreach($users as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                @endforeach
            </x-inputs.tomselect>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.tomselect
                name="approved_borrowed_by"
                label="{{ __('crud.tool_loans.inputs.approved_borrowed_by') }}"
            >
                @php $selected = old('approved_borrowed_by', ($editing ? $toolLoan->approved_borrowed_by : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
                @foreach($users as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                @endforeach
            </x-inputs.tomselect>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.tomselect
                name="approved_returned_by"
                label="{{ __('crud.tool_loans.inputs.approved_returned_by') }}"
            >
                @php $selected = old('approved_returned_by', ($editing ? $toolLoan->approved_returned_by : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
                @foreach($users as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                @endforeach
            </x-inputs.tomselect>
        </x-inputs.group>
    </div>
</x-partials.card>
