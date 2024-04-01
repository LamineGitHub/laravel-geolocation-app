<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

abstract class ParentController extends Controller
{
    protected Model $model;
    protected Model $relation;
    protected string $relationName;
    protected string $pluralRelationName;
    protected string $viewName;
    protected string $upperViewName;
    protected string $pluralViewName;

    protected function __construct(protected string $classModel, protected string $relationModel = "")
    {
        $this->model = new $this->classModel;
        $this->upperViewName = Str::title($this->viewName);
        $this->pluralViewName = Str::plural($this->viewName);

        if ($this->relationModel) {
            $this->relation = new $this->relationModel;
            $this->relationName = Str::lower(Str::afterLast($this->relationModel, "\\"));
            $this->pluralRelationName = Str::plural($this->relationName);
        }
    }

    public function search(Request $request)
    {
        $request->validate([
            'searchInput' => 'nullable|string'
        ]);

        $searchInput = $request->input('searchInput', '');

        if (empty($searchInput)) {
            return redirect()->route($this->viewName . '.index');
        }

        $search = $this->model::where('nom', 'like', '%' . $searchInput . '%')->get();

        return view($this->viewName . '.index', [
            $this->pluralViewName => $search,
            'searchInput' => $searchInput
        ]);
    }

    public function index(): View
    {
        if ($this->relationModel) {
            return view($this->viewName . '.index', [
                $this->pluralViewName => $this->model::orderByDesc('id')->with($this->relationName)->get()
            ]);
        }

        return view($this->viewName . '.index', [
            $this->pluralViewName => $this->model::orderByDesc('id')->get()
        ]);
    }

    public function show(int $id): View
    {
        return view($this->viewName . '.show', [
            $this->viewName => $this->model::findOrFail($id)
        ]);
    }

    public function edit(int $id): View
    {
        $model = $this->model::findOrFail($id);

        $this->authorize('update', $model);

        if ($this->relationModel) {
            return view($this->viewName . '.edit', [
                $this->viewName => $model,
                $this->pluralRelationName => $this->relation::select(['id', 'nom'])->get()
            ]);
        }

        return view($this->viewName . '.edit', [
            $this->viewName => $model
        ]);
    }

    public function destroy(int $id): RedirectResponse
    {
        $model = $this->model::findOrFail($id);

        $this->authorize('delete', $model);

        $model->delete();

        return to_route($this->viewName . '.index')
            ->with('message', $this->upperViewName . ' supprimé avec succès');
    }

    public function create(): View
    {
        if ($this->relationModel) {
            return view($this->viewName . '.create', [
                $this->viewName => new $this->model(),
                $this->pluralRelationName => $this->relation::select(['id', 'nom'])->get()
            ]);
        }

        return view($this->viewName . '.create', [
            $this->viewName => new $this->model()
        ]);
    }
}
