@php $editing = isset($toolCategory) @endphp

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
                :value="old('name', ($editing ? $toolCategory->name : ''))"
                label="{{ __('crud.tool_categories.inputs.name') }}"
                placeholder="{{ __('crud.tool_categories.inputs.name') }}"
                maxlength="255"
                required
            ></x-inputs.text>
        </x-inputs.group>

        <x-inputs.group class="w-full">
            <x-inputs.textarea
                name="description"
                label="{{ __('crud.tool_categories.inputs.description') }}"
                placeholder="{{ __('crud.tool_categories.inputs.description') }}"
                maxlength="255"
            >
                {{ old('description', ($editing ? $toolCategory->description :
                '')) }}
            </x-inputs.textarea>
        </x-inputs.group>
    </div>
</x-partials.card>
