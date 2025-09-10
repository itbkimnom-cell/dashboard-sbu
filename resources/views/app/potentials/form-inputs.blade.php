@php $editing = isset($potential) @endphp

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
                name="job_type"
                :value="old('job_type', ($editing ? $potential->job_type : ''))"
                label="{{ __('crud.potentials.inputs.job_type') }}"
                placeholder="{{ __('crud.potentials.inputs.job_type') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="project_name"
                :value="old('project_name', ($editing ? $potential->project_name : ''))"
                label="{{ __('crud.potentials.inputs.project_name') }}"
                placeholder="{{ __('crud.potentials.inputs.project_name') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="source"
                :value="old('source', ($editing ? $potential->source : ''))"
                label="{{ __('crud.potentials.inputs.source') }}"
                placeholder="{{ __('crud.potentials.inputs.source') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="interest_level"
                :value="old('interest_level', ($editing ? $potential->interest_level : ''))"
                label="{{ __('crud.potentials.inputs.interest_level') }}"
                placeholder="{{ __('crud.potentials.inputs.interest_level') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.slider
                name="estimated_value"
                :value="old('estimated_value', ($editing ? $potential->estimated_value : ''))"
                label="{{ __('crud.potentials.inputs.estimated_value') }}"
                placeholder="{{ __('crud.potentials.inputs.estimated_value') }}"
                max="255"
                step="0.01"
                required
            ></x-inputs.slider>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="status"
                :value="old('status', ($editing ? $potential->status : ''))"
                label="{{ __('crud.potentials.inputs.status') }}"
                placeholder="{{ __('crud.potentials.inputs.status') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.textarea
                name="notes"
                label="{{ __('crud.potentials.inputs.notes') }}"
                placeholder="{{ __('crud.potentials.inputs.notes') }}"
                maxlength="255"
                required
            >
                {{ old('notes', ($editing ? $potential->notes : '')) }}
            </x-inputs.textarea>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.tomselect
                name="company_id"
                label="{{ __('crud.potentials.inputs.company_id') }}"
                required
            >
                @php $selected = old('company_id', ($editing ? $potential->company_id : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Company</option>
                @foreach($companies as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                @endforeach
            </x-inputs.tomselect>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.tomselect
                name="created_by"
                label="{{ __('crud.potentials.inputs.created_by') }}"
                required
            >
                @php $selected = old('created_by', ($editing ? $potential->created_by : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
                @foreach($users as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                @endforeach
            </x-inputs.tomselect>
        </x-inputs.group>
    </div>
</x-partials.card>
