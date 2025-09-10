<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.leads.index_title')
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
                            @can('create', App\Models\Lead::class)
                            <a
                                href="{{ route('leads.create') }}"
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
                                    @lang('crud.leads.inputs.stage')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.leads.inputs.probability')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.leads.inputs.expected_close_date')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.leads.inputs.lead_value')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.leads.inputs.competitor')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.leads.inputs.status')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.leads.inputs.lost_reason')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.leads.inputs.notes')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.leads.inputs.closed_at')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.leads.inputs.potential_id')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($leads as $lead)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    {{ $lead->stage ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $lead->probability ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{
                                    optional($lead->expected_close_date)->format('D,
                                    d M Y') }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $lead->lead_value ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $lead->competitor ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $lead->status ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $lead->lost_reason ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $lead->notes ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($lead->closed_at)->format('D, d
                                    M Y') }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ optional($lead->potential)->job_type ??
                                    '-' }}
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
                                        @can('update', $lead)
                                        <a
                                            href="{{ route('leads.edit', $lead) }}"
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
                                        @endcan @can('view', $lead)
                                        <a
                                            href="{{ route('leads.show', $lead) }}"
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
                                        {!! $leads->render() !!}
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
