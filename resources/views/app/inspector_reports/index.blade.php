<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.inspector_reports.index_title')
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
                            @can('create', App\Models\InspectorReport::class)
                            <a
                                href="{{ route('inspector-reports.create') }}"
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
                                    @lang('crud.inspector_reports.inputs.name')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.inspector_reports.inputs.inspection_date')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.inspector_reports.inputs.file_report')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.inspector_reports.inputs.file_report_date')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.inspector_reports.inputs.file_bast')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.inspector_reports.inputs.file_bast_date')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.inspector_reports.inputs.inspector_user_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.inspector_reports.inputs.administration_user_id')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($inspectorReports as $inspectorReport)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    {{ $inspectorReport->name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{
                                    optional($inspectorReport->inspection_date)->format('D,
                                    d M Y') }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $inspectorReport->file_report ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{
                                    optional($inspectorReport->file_report_date)->format('D,
                                    d M Y') }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $inspectorReport->file_bast ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{
                                    optional($inspectorReport->file_bast_date)->format('D,
                                    d M Y') }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{
                                    optional($inspectorReport->inspectorUser)->name
                                    ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{
                                    optional($inspectorReport->administrationUser)->name
                                    ?? '-' }}
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
                                        @can('update', $inspectorReport)
                                        <a
                                            href="{{ route('inspector-reports.edit', $inspectorReport) }}"
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
                                        @endcan @can('view', $inspectorReport)
                                        <a
                                            href="{{ route('inspector-reports.show', $inspectorReport) }}"
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
                                <td colspan="9">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="9">
                                    <div class="mt-10 px-4">
                                        {!! $inspectorReports->render() !!}
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
