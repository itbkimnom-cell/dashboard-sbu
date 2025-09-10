<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ToolLoan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ToolInventory;
use Illuminate\Http\RedirectResponse;
use fredyns\stringcleaner\StringCleaner;
use App\Http\Requests\ToolLoanStoreRequest;
use App\Http\Requests\ToolLoanUpdateRequest;

class ToolLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', ToolLoan::class);

        $search = (string) $request->get('search', '');

        if (!$search or $search == 'null') {
            $search = '';
        }

        $toolLoans = ToolLoan::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('app.tool_loans.index', compact('toolLoans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', ToolLoan::class);

        $toolInventories = ToolInventory::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.tool_loans.create',
            compact('toolInventories', 'users', 'users', 'users')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ToolLoanStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', ToolLoan::class);

        $validated = $request->validated();
        if (isset($validated['notes'])) {
            $validated['notes'] = StringCleaner::forRTF($validated['notes']);
        }

        $toolLoan = ToolLoan::create($validated);

        return redirect()
            ->route('tool-loans.show', $toolLoan)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, ToolLoan $toolLoan): View
    {
        $this->authorize('view', $toolLoan);

        return view('app.tool_loans.show', compact('toolLoan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, ToolLoan $toolLoan): View
    {
        $this->authorize('update', $toolLoan);

        $toolInventories = ToolInventory::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.tool_loans.edit',
            compact('toolLoan', 'toolInventories', 'users', 'users', 'users')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ToolLoanUpdateRequest $request,
        ToolLoan $toolLoan
    ): RedirectResponse {
        $this->authorize('update', $toolLoan);

        $validated = $request->validated();

        $validated['notes'] = StringCleaner::forRTF($validated['notes']);

        $toolLoan->update($validated);

        return redirect()
            ->route('tool-loans.show', $toolLoan)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        ToolLoan $toolLoan
    ): RedirectResponse {
        $this->authorize('delete', $toolLoan);

        $toolLoan->delete();

        return redirect()
            ->route('tool-loans.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
