<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        $this->authorize('read Payment');
        $payments = Payment::useFilters()->dynamicPaginate();

        return view('dashboard.payments.index', compact('payments'));
    }

    public function show(Payment $payment)
    {
        $this->authorize('read Payment');
        return view('dashboard.payments.show', compact('payment'));
    }

    public function destroy(Payment $payment)
    {
        $this->authorize('delete Payment');
        $payment->delete();

        return to_route('dashboard.payments.index')->with('success', __('deleted successfully'));
    }
}
