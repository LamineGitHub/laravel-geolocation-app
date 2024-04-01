<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegionFormRequest;
use App\Models\Region;
use Illuminate\Http\RedirectResponse;

class RegionController extends ParentController
{
    protected string $viewName = 'region';

    public function __construct()
    {
        parent::__construct(Region::class);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegionFormRequest $request): RedirectResponse
    {
        $request->user()->regions()->create($request->validated());

        return to_route($this->viewName . '.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegionFormRequest $request, Region $region): RedirectResponse
    {
        $this->authorize('update', $region);

        $region->update($request->validated());

        return to_route($this->viewName . '.index');
    }
}
