<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Status;
use App\Models\Payment;
use App\Models\Marchant;
use Illuminate\Database\Seeder;
use App\Models\SubscriptionPlan;
use App\Models\SubscriptionPlanFeature;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create();
        $user->syncPermissions(Permission::all());
        $subscriptionPlans = SubscriptionPlan::factory()->count(5)->create();

        $subscriptionPlans->each(function ($plan) {
            SubscriptionPlanFeature::factory()->count(10)->create(['subscription_plan_id' => $plan->id]);
        });
        Payment::factory()->create();
        Marchant::factory()->count(30)->create();
    }
}
