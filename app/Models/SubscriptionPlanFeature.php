<?php

namespace App\Models;

use App\Models\Status;
use App\Models\SubscriptionPlan;
use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubscriptionPlanFeature extends Model
{
    use HasFactory, HasStatus;

    protected $fillable = ['name', 'subscription_plan_id', 'status_id'];

    const STATUSES = [
        Status::ACTIVE => 'Active',
        Status::NOT_ACTIVE => 'Not Active',
    ];

    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
