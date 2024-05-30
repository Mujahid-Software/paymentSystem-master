<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    public function home()
    {
        $subscriptionPlans = SubscriptionPlan::isActive()->get();
        return view('home', compact('subscriptionPlans'));
    }

    public function subscribe(Request $request, $id)
    {
        $subscriptionPlan = SubscriptionPlan::isActive()->findOrFail($id);
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);
        session()->put('name', $request->name);
        session()->put('email', $request->email);


        return view('subscriptionPalns.subscribe', compact('subscriptionPlan'));
    }
    public function changeLocale(Request $request)
    {
        $request->validate(['locale' => 'string|in:ar,en']);
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();
    }
}
