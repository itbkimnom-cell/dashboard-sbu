@php $editing = isset($company) @endphp

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
                :value="old('name', ($editing ? $company->name : ''))"
                label="{{ __('crud.companies.inputs.name') }}"
                placeholder="{{ __('crud.companies.inputs.name') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="industry"
                :value="old('industry', ($editing ? $company->industry : ''))"
                label="{{ __('crud.companies.inputs.industry') }}"
                placeholder="{{ __('crud.companies.inputs.industry') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.textarea
                name="address"
                label="{{ __('crud.companies.inputs.address') }}"
                placeholder="{{ __('crud.companies.inputs.address') }}"
                maxlength="255"
                required
            >
                {{ old('address', ($editing ? $company->address : '')) }}
            </x-inputs.textarea>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="phone"
                :value="old('phone', ($editing ? $company->phone : ''))"
                label="{{ __('crud.companies.inputs.phone') }}"
                placeholder="{{ __('crud.companies.inputs.phone') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.email
                name="email"
                :value="old('email', ($editing ? $company->email : ''))"
                label="{{ __('crud.companies.inputs.email') }}"
                placeholder="{{ __('crud.companies.inputs.email') }}"
                maxlength="255"
                required
            ></x-inputs.email>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="website"
                :value="old('website', ($editing ? $company->website : ''))"
                label="{{ __('crud.companies.inputs.website') }}"
                placeholder="{{ __('crud.companies.inputs.website') }}"
                maxlength="255"
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="pic_name"
                :value="old('pic_name', ($editing ? $company->pic_name : ''))"
                label="{{ __('crud.companies.inputs.pic_name') }}"
                placeholder="{{ __('crud.companies.inputs.pic_name') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="pic_position"
                :value="old('pic_position', ($editing ? $company->pic_position : ''))"
                label="{{ __('crud.companies.inputs.pic_position') }}"
                placeholder="{{ __('crud.companies.inputs.pic_position') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.text
                name="pic_phone"
                :value="old('pic_phone', ($editing ? $company->pic_phone : ''))"
                label="{{ __('crud.companies.inputs.pic_phone') }}"
                placeholder="{{ __('crud.companies.inputs.pic_phone') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.tomselect
                name="created_by"
                label="{{ __('crud.companies.inputs.created_by') }}"
                required
            >
                @php $selected = old('created_by', ($editing ? $company->created_by : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
                @foreach($users as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                @endforeach
            </x-inputs.tomselect>
        </x-inputs.group>
    </div>
</x-partials.card>
