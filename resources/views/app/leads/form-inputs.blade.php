@php $editing = isset($lead) @endphp

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
                name="stage"
                :value="old('stage', ($editing ? $lead->stage : ''))"
                label="{{ __('crud.leads.inputs.stage') }}"
                placeholder="{{ __('crud.leads.inputs.stage') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.slider
                name="probability"
                :value="old('probability', ($editing ? $lead->probability : ''))"
                label="{{ __('crud.leads.inputs.probability') }}"
                placeholder="{{ __('crud.leads.inputs.probability') }}"
                max="255"
                required
            ></x-inputs.slider>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.date
                name="expected_close_date"
                value="{{ old('expected_close_date', ($editing ? optional($lead->expected_close_date)->format('Y-m-d') : '')) }}"
                label="{{ __('crud.leads.inputs.expected_close_date') }}"
                placeholder="{{ __('crud.leads.inputs.expected_close_date') }}"
                max="255"
                required
            ></x-inputs.date>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.slider
                name="lead_value"
                :value="old('lead_value', ($editing ? $lead->lead_value : ''))"
                label="{{ __('crud.leads.inputs.lead_value') }}"
                placeholder="{{ __('crud.leads.inputs.lead_value') }}"
                max="255"
                step="0.01"
                required
            ></x-inputs.slider>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="competitor"
                :value="old('competitor', ($editing ? $lead->competitor : ''))"
                label="{{ __('crud.leads.inputs.competitor') }}"
                placeholder="{{ __('crud.leads.inputs.competitor') }}"
                maxlength="255"
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="status"
                :value="old('status', ($editing ? $lead->status : ''))"
                label="{{ __('crud.leads.inputs.status') }}"
                placeholder="{{ __('crud.leads.inputs.status') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.textarea
                name="lost_reason"
                label="{{ __('crud.leads.inputs.lost_reason') }}"
                placeholder="{{ __('crud.leads.inputs.lost_reason') }}"
                maxlength="255"
                required
            >
                {{ old('lost_reason', ($editing ? $lead->lost_reason : '')) }}
            </x-inputs.textarea>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.textarea
                name="notes"
                label="{{ __('crud.leads.inputs.notes') }}"
                placeholder="{{ __('crud.leads.inputs.notes') }}"
                maxlength="255"
                required
            >
                {{ old('notes', ($editing ? $lead->notes : '')) }}
            </x-inputs.textarea>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.date
                name="closed_at"
                value="{{ old('closed_at', ($editing ? optional($lead->closed_at)->format('Y-m-d') : '')) }}"
                label="{{ __('crud.leads.inputs.closed_at') }}"
                placeholder="{{ __('crud.leads.inputs.closed_at') }}"
                max="255"
                required
            ></x-inputs.date>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.tomselect
                name="potential_id"
                label="{{ __('crud.leads.inputs.potential_id') }}"
                required
            >
                @php $selected = old('potential_id', ($editing ? $lead->potential_id : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Potential</option>
                @foreach($potentials as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                @endforeach
            </x-inputs.tomselect>
        </x-inputs.group>
    </div>
</x-partials.card>
