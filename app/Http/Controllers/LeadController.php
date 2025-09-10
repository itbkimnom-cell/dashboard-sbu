<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\View\View;
use App\Models\Potential;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LeadStoreRequest;
use App\Http\Requests\LeadUpdateRequest;
use fredyns\stringcleaner\StringCleaner;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Lead::class);

        $search = (string) $request->get('search', '');

        if (!$search or $search == 'null') {
            $search = '';
        }

        $leads = Lead::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('app.leads.index', compact('leads', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Lead::class);

        $potentials = Potential::pluck('project_name', 'id');

        return view('app.leads.create', compact('potentials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeadStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Lead::class);

        $validated = $request->validated();
        if (isset($validated['lost_reason'])) {
            $validated['lost_reason'] = StringCleaner::forRTF(
                $validated['lost_reason']
            );
        }
        if (isset($validated['notes'])) {
            $validated['notes'] = StringCleaner::forRTF($validated['notes']);
        }

        $lead = Lead::create($validated);

        return redirect()
            ->route('leads.show', $lead)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Lead $lead): View
    {
        $this->authorize('view', $lead);

        return view('app.leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Lead $lead): View
    {
        $this->authorize('update', $lead);

        $potentials = Potential::pluck('job_type', 'id');

        return view('app.leads.edit', compact('lead', 'potentials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        LeadUpdateRequest $request,
        Lead $lead
    ): RedirectResponse {
        $this->authorize('update', $lead);

        $validated = $request->validated();

        $validated['lost_reason'] = StringCleaner::forRTF(
            $validated['lost_reason']
        );
        $validated['notes'] = StringCleaner::forRTF($validated['notes']);

        $lead->update($validated);

        return redirect()
            ->route('leads.show', $lead)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Lead $lead): RedirectResponse
    {
        $this->authorize('delete', $lead);

        $lead->delete();

        return redirect()
            ->route('leads.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
