<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Payment;
use App\Models\SubscriptionPlan;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $subscriptionPlansCount = SubscriptionPlan::count();
        $paymentsCount = Payment::count();


        return view('dashboard.index', compact('usersCount', 'subscriptionPlansCount', 'paymentsCount'));
    }
}
