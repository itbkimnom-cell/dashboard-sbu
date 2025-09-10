<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ToolCategory;
use App\Models\ToolInventory;
use Illuminate\Http\RedirectResponse;
use fredyns\stringcleaner\StringCleaner;
use App\Http\Requests\ToolInventoryStoreRequest;
use App\Http\Requests\ToolInventoryUpdateRequest;

class ToolInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', ToolInventory::class);

        $search = (string) $request->get('search', '');

        if (!$search or $search == 'null') {
            $search = '';
        }

        $toolInventories = ToolInventory::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'app.tool_inventories.index',
            compact('toolInventories', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', ToolInventory::class);

        $toolCategories = ToolCategory::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.tool_inventories.create',
            compact('toolCategories', 'users')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ToolInventoryStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', ToolInventory::class);

        $validated = $request->validated();
        if (isset($validated['notes'])) {
            $validated['notes'] = StringCleaner::forRTF($validated['notes']);
        }

        $toolInventory = ToolInventory::create($validated);

        return redirect()
            ->route('tool-inventories.show', $toolInventory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, ToolInventory $toolInventory): View
    {
        $this->authorize('view', $toolInventory);

        return view('app.tool_inventories.show', compact('toolInventory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, ToolInventory $toolInventory): View
    {
        $this->authorize('update', $toolInventory);

        $toolCategories = ToolCategory::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.tool_inventories.edit',
            compact('toolInventory', 'toolCategories', 'users')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ToolInventoryUpdateRequest $request,
        ToolInventory $toolInventory
    ): RedirectResponse {
        $this->authorize('update', $toolInventory);

        $validated = $request->validated();

        $validated['notes'] = StringCleaner::forRTF($validated['notes']);

        $toolInventory->update($validated);

        return redirect()
            ->route('tool-inventories.show', $toolInventory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        ToolInventory $toolInventory
    ): RedirectResponse {
        $this->authorize('delete', $toolInventory);

        $toolInventory->delete();

        return redirect()
            ->route('tool-inventories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
