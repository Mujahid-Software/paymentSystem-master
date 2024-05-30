<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\SubscriptionPlan;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSubscriptionPlanRequest;
use App\Http\Requests\UpdateSubscriptionPlanRequest;

class SubscriptionPlanController extends Controller
{
    public function index()
    {
        $this->authorize('read SubscriptionPlan');
        $subscriptionPlans = SubscriptionPlan::useFilters()->dynamicPaginate();

        return view('dashboard.subscriptionPlans.index', compact('subscriptionPlans'));
    }

    public function create()
    {
        $this->authorize('create SubscriptionPlan');
        return view('dashboard.subscriptionPlans.create');
    }

    public function store(CreateSubscriptionPlanRequest $request)
    {
        $this->authorize('create SubscriptionPlan');
        $validatedData = $request->validated();
        $subscriptionPlan = SubscriptionPlan::create($validatedData);

        if ($request->features) {
            $featuresData = [];
            foreach ($validatedData['features'] as $featureData) {
                $featuresData[] = [
                    'name' => $featureData['name'],
                    'status_id' => $featureData['status_id'],
                ];
            }
            $subscriptionPlan->features()->createMany($featuresData);
        }

        return to_route('dashboard.subscriptionPlans.index')->with('success', __('created successfully'));
    }

    public function show(SubscriptionPlan $subscriptionPlan)
    {
        $this->authorize('read SubscriptionPlan');
        return view('dashboard.subscriptionPlans.show', compact('subscriptionPlan'));
    }

    public function edit(SubscriptionPlan $subscriptionPlan)
    {
        $this->authorize('update SubscriptionPlan');
        return view('dashboard.subscriptionPlans.edit', compact('subscriptionPlan'));
    }

    public function update(UpdateSubscriptionPlanRequest $request, SubscriptionPlan $subscriptionPlan)
    {
        $this->authorize('update SubscriptionPlan');

        $validatedData = $request->validated();

        $subscriptionPlan->update($validatedData);
        if ($request->features == null) {
            $subscriptionPlan->features()->delete();
        }
        if (isset($validatedData['features'])) {
            $featuresData = [];
            foreach ($validatedData['features'] as $featureData) {
                $featuresData[] = [
                    'name' => $featureData['name'],
                    'status_id' => $featureData['status_id'],
                ];
            }

            $subscriptionPlan->features()->delete();
            $subscriptionPlan->features()->createMany($featuresData);
        }

        return back()->with('success', __('updated successfully'));
    }


    public function destroy(SubscriptionPlan $subscriptionPlan)
    {
        $this->authorize('delete SubscriptionPlan');
        $subscriptionPlan->delete();

        return to_route('dashboard.subscriptionPlans.index')->with('success', __('deleted successfully'));
    }
}
