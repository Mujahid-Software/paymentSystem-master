<?php

namespace App\Models;

use App\Filters\PaymentFilter;
use App\Models\Status;
use App\Models\SubscriptionPlan;
use App\Traits\HasStatus;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory, Filterable, HasStatus;

    protected $fillable = [
        'transaction_id',
        'customer_name',
        'subscription_plan_id',
        'amount',
        'payment_method',
        'period',
        'status_id',
    ];

    const STATUSES = [
        Status::SUCCESSFULL => 'Successful',
        Status::FAILED => 'Failed',
    ];

    protected $default_filters = PaymentFilter::class;

    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }
}
