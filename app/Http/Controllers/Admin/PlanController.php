<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PlanController extends Controller
{
    private $model;

    public function __construct(Plan $plan)
    {
        $this->model = $plan;
    }

    public function index()
    {
        $plans = $this->model->getAll();

        $title = "Planos";

        return view('admin.pages.plans.index', [
            'title' => $title,
            'plans' => $plans,
        ]);
    }

    public function create()
    {
        $title = "Criar novo Plano";

        return view('admin.pages.plans.create', [
            'title' => $title,
        ]);
    }

    public function store(StoreUpdatePlanRequest $request)
    {
        DB::beginTransaction();

        try {
            $this->model->create($request->all());
            DB::commit();

            return redirect()->route('plans.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function show($url)
    {
        $plan = $this->model->findByURL($url);

        if (!$plan)
            return redirect()->back();

        $title = "Detalhes do {$plan->name}";

        return view('admin.pages.plans.show', [
            'title' => $title,
            'plan' => $plan,
        ]);
    }

    public function edit($url)
    {
        $plan = $this->model->findByURL($url);

        if (!$plan)
            return redirect()->back();

        $title = "Editar o {$plan->name}";

        return view('admin.pages.plans.edit', [
            'title' => $title,
            'plan' => $plan,
        ]);
    }

    public function update(StoreUpdatePlanRequest $request, $url)
    {
        $plan = $this->model->findByURL($url);

        if (!$plan)
            return redirect()->back();

        DB::beginTransaction();

        try {
            $plan->update($request->all());
            DB::commit();

            return redirect()->route('plans.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function destroy($url)
    {
        $plan = $this->model->findByURL($url);

        if (!$plan)
            return redirect()->back();

        $plan->delete();

        return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $plans = $this->model->search($request->filter);

        $title = "Planos";

        return view('admin.pages.plans.index', [
            'title' => $title,
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }
}
