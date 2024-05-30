<?php

namespace App\Models;

use App\Models\Payment;
use App\Filters\SubscriptionPlanFilter;
use App\Models\SubscriptionPlanFeature;
use App\Traits\HasStatus;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubscriptionPlan extends Model
{
    use HasFactory, Filterable, HasStatus;

    protected $fillable = ['name', 'description', 'price', 'association_name', 'status_id'];

    const STATUSES = [
        Status::ACTIVE => 'Active',
        Status::NOT_ACTIVE => 'Not Active',
    ];

    protected $default_filters = SubscriptionPlanFilter::class;

    public function features()
    {
        return $this->hasMany(SubscriptionPlanFeature::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
