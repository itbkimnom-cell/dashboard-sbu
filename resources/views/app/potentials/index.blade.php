<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.potentials.index_title')
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
                            @can('create', App\Models\Potential::class)
                            <a
                                href="{{ route('potentials.create') }}"
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
                                    @lang('crud.potentials.inputs.job_type')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.potentials.inputs.project_name')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.potentials.inputs.source')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.potentials.inputs.interest_level')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.potentials.inputs.estimated_value')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.potentials.inputs.status')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.potentials.inputs.notes')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.potentials.inputs.company_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.potentials.inputs.created_by')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($potentials as $potential)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    {{ $potential->job_type ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $potential->project_name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $potential->source ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $potential->interest_level ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $potential->estimated_value ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $potential->status ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $potential->notes ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($potential->company)->name ??
                                    '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($potential->user)->name ?? '-'
                                    }}
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
                                        @can('update', $potential)
                                        <a
                                            href="{{ route('potentials.edit', $potential) }}"
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
                                        @endcan @can('view', $potential)
                                        <a
                                            href="{{ route('potentials.show', $potential) }}"
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
                                <td colspan="10">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10">
                                    <div class="mt-10 px-4">
                                        {!! $potentials->render() !!}
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
