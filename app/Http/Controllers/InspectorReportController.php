<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\InspectorReport;
use Illuminate\Http\RedirectResponse;
use fredyns\stringcleaner\StringCleaner;
use App\Http\Requests\InspectorReportStoreRequest;
use App\Http\Requests\InspectorReportUpdateRequest;

class InspectorReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', InspectorReport::class);

        $search = (string) $request->get('search', '');

        if (!$search or $search == 'null') {
            $search = '';
        }

        $inspectorReports = InspectorReport::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'app.inspector_reports.index',
            compact('inspectorReports', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', InspectorReport::class);

        $users = User::pluck('name', 'id');

        return view('app.inspector_reports.create', compact('users', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        InspectorReportStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', InspectorReport::class);

        $validated = $request->validated();

        $inspectorReport = InspectorReport::create($validated);

        return redirect()
            ->route('inspector-reports.show', $inspectorReport)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        InspectorReport $inspectorReport
    ): View {
        $this->authorize('view', $inspectorReport);

        return view('app.inspector_reports.show', compact('inspectorReport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        InspectorReport $inspectorReport
    ): View {
        $this->authorize('update', $inspectorReport);

        $users = User::pluck('name', 'id');

        return view(
            'app.inspector_reports.edit',
            compact('inspectorReport', 'users', 'users')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        InspectorReportUpdateRequest $request,
        InspectorReport $inspectorReport
    ): RedirectResponse {
        $this->authorize('update', $inspectorReport);

        $validated = $request->validated();

        $inspectorReport->update($validated);

        return redirect()
            ->route('inspector-reports.show', $inspectorReport)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        InspectorReport $inspectorReport
    ): RedirectResponse {
        $this->authorize('delete', $inspectorReport);

        $inspectorReport->delete();

        return redirect()
            ->route('inspector-reports.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
