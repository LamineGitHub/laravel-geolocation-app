<?php

namespace App\Http\Controllers;

use App\Http\Requests\TerrainFormRequest;
use App\Models\Terrain;
use App\Models\Zone;
use Illuminate\Http\RedirectResponse;

class TerrainController extends ParentController
{
    protected string $viewName = 'terrain';

    public function __construct()
    {
        parent::__construct(Terrain::class, Zone::class);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TerrainFormRequest $request): RedirectResponse
    {
        $request->user()->terrains()->create($request->validated());

        return to_route($this->viewName . '.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TerrainFormRequest $request, Terrain $terrain): RedirectResponse
    {
//        dd($request->all());
        $this->authorize('update', $terrain);

        $terrain->update($request->validated());

        return to_route($this->viewName . '.index');
    }
}
