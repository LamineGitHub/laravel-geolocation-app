<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZoneFormRequest;
use App\Models\Region;
use App\Models\Zone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ZoneController extends ParentController
{
    protected string $viewName = 'zone';
    public function __construct()
    {
        parent::__construct(Zone::class, Region::class);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ZoneFormRequest $request): RedirectResponse
    {
        $request->user()->zones()->create($request->validated());

        return to_route($this->viewName . '.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ZoneFormRequest $request, Zone $zone): RedirectResponse
    {
        $this->authorize('update', $zone);

        $zone->update($request->validated());

        return to_route($this->viewName . '.index');
    }

}
