<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Potential;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use fredyns\stringcleaner\StringCleaner;
use App\Http\Requests\PotentialStoreRequest;
use App\Http\Requests\PotentialUpdateRequest;

class PotentialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Potential::class);

        $search = (string) $request->get('search', '');

        if (!$search or $search == 'null') {
            $search = '';
        }

        $potentials = Potential::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('app.potentials.index', compact('potentials', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Potential::class);

        $companies = Company::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('app.potentials.create', compact('companies', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PotentialStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Potential::class);

        $validated = $request->validated();
        if (isset($validated['notes'])) {
            $validated['notes'] = StringCleaner::forRTF($validated['notes']);
        }

        $potential = Potential::create($validated);

        return redirect()
            ->route('potentials.show', $potential)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Potential $potential): View
    {
        $this->authorize('view', $potential);

        return view('app.potentials.show', compact('potential'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Potential $potential): View
    {
        $this->authorize('update', $potential);

        $companies = Company::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.potentials.edit',
            compact('potential', 'companies', 'users')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        PotentialUpdateRequest $request,
        Potential $potential
    ): RedirectResponse {
        $this->authorize('update', $potential);

        $validated = $request->validated();

        $validated['notes'] = StringCleaner::forRTF($validated['notes']);

        $potential->update($validated);

        return redirect()
            ->route('potentials.show', $potential)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Potential $potential
    ): RedirectResponse {
        $this->authorize('delete', $potential);

        $potential->delete();

        return redirect()
            ->route('potentials.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
