<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\ToolCategory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use fredyns\stringcleaner\StringCleaner;
use App\Http\Requests\ToolCategoryStoreRequest;
use App\Http\Requests\ToolCategoryUpdateRequest;

class ToolCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', ToolCategory::class);

        $search = (string) $request->get('search', '');

        if (!$search or $search == 'null') {
            $search = '';
        }

        $toolCategories = ToolCategory::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'app.tool_categories.index',
            compact('toolCategories', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', ToolCategory::class);

        return view('app.tool_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ToolCategoryStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', ToolCategory::class);

        $validated = $request->validated();
        if (isset($validated['description'])) {
            $validated['description'] = StringCleaner::forRTF(
                $validated['description']
            );
        }

        $toolCategory = ToolCategory::create($validated);

        return redirect()
            ->route('tool-categories.show', $toolCategory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, ToolCategory $toolCategory): View
    {
        $this->authorize('view', $toolCategory);

        return view('app.tool_categories.show', compact('toolCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, ToolCategory $toolCategory): View
    {
        $this->authorize('update', $toolCategory);

        return view('app.tool_categories.edit', compact('toolCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ToolCategoryUpdateRequest $request,
        ToolCategory $toolCategory
    ): RedirectResponse {
        $this->authorize('update', $toolCategory);

        $validated = $request->validated();

        $validated['description'] = StringCleaner::forRTF(
            $validated['description']
        );

        $toolCategory->update($validated);

        return redirect()
            ->route('tool-categories.show', $toolCategory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        ToolCategory $toolCategory
    ): RedirectResponse {
        $this->authorize('delete', $toolCategory);

        $toolCategory->delete();

        return redirect()
            ->route('tool-categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
