<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromoteurFormRequest;
use App\Models\Promoteur;
use Illuminate\Http\RedirectResponse;

class PromoteurController extends ParentController
{
    protected string $viewName = 'promoteur';
    public function __construct()
    {
        parent::__construct(Promoteur::class);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PromoteurFormRequest $request): RedirectResponse
    {
        $request->user()->promoteurs()->create($request->validated());

        return to_route($this->viewName . '.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PromoteurFormRequest $request, Promoteur $promoteur): RedirectResponse
    {
        $this->authorize('update', $promoteur);

        $promoteur->update($request->validated());

        return to_route($this->viewName . '.index');
    }
}
