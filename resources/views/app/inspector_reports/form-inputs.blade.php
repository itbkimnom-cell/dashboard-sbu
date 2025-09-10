@php $editing = isset($inspectorReport) @endphp

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
                :value="old('name', ($editing ? $inspectorReport->name : ''))"
                label="{{ __('crud.inspector_reports.inputs.name') }}"
                placeholder="{{ __('crud.inspector_reports.inputs.name') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.date
                name="inspection_date"
                value="{{ old('inspection_date', ($editing ? optional($inspectorReport->inspection_date)->format('Y-m-d') : '')) }}"
                label="{{ __('crud.inspector_reports.inputs.inspection_date') }}"
                placeholder="{{ __('crud.inspector_reports.inputs.inspection_date') }}"
                max="255"
                required
            ></x-inputs.date>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="file_report"
                :value="old('file_report', ($editing ? $inspectorReport->file_report : ''))"
                label="{{ __('crud.inspector_reports.inputs.file_report') }}"
                placeholder="{{ __('crud.inspector_reports.inputs.file_report') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.date
                name="file_report_date"
                value="{{ old('file_report_date', ($editing ? optional($inspectorReport->file_report_date)->format('Y-m-d') : '')) }}"
                label="{{ __('crud.inspector_reports.inputs.file_report_date') }}"
                placeholder="{{ __('crud.inspector_reports.inputs.file_report_date') }}"
                max="255"
                required
            ></x-inputs.date>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="file_bast"
                :value="old('file_bast', ($editing ? $inspectorReport->file_bast : ''))"
                label="{{ __('crud.inspector_reports.inputs.file_bast') }}"
                placeholder="{{ __('crud.inspector_reports.inputs.file_bast') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.date
                name="file_bast_date"
                value="{{ old('file_bast_date', ($editing ? optional($inspectorReport->file_bast_date)->format('Y-m-d') : '')) }}"
                label="{{ __('crud.inspector_reports.inputs.file_bast_date') }}"
                placeholder="{{ __('crud.inspector_reports.inputs.file_bast_date') }}"
                max="255"
                required
            ></x-inputs.date>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.tomselect
                name="inspector_user_id"
                label="{{ __('crud.inspector_reports.inputs.inspector_user_id') }}"
                required
            >
                @php $selected = old('inspector_user_id', ($editing ? $inspectorReport->inspector_user_id : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
                @foreach($users as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                @endforeach
            </x-inputs.tomselect>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.tomselect
                name="administration_user_id"
                label="{{ __('crud.inspector_reports.inputs.administration_user_id') }}"
                required
            >
                @php $selected = old('administration_user_id', ($editing ? $inspectorReport->administration_user_id : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
                @foreach($users as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                @endforeach
            </x-inputs.tomselect>
        </x-inputs.group>
    </div>
</x-partials.card>
