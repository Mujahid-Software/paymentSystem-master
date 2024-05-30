@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Payments")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Payments")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __("Payment Details") }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <th>{{ __("ID") }}</th>
                                <td>{{ $payment->id }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Transaction ID") }}</th>
                                <td>{{ $payment->transaction_id }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Subscription Plan") }}</th>
                                <td>{{ $payment->subscriptionPlan->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Period") }}</th>
                                <td>{{ $payment->period }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Amount") }}</th>
                                <td>{{ $payment->amount }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Payment Method") }}</th>
                                <td>{{ $payment->payment_method }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Customer Name") }}</th>
                                <td>{{ $payment->customer_name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Status") }}</th>
                                <td><x-dashboard.table-status-badge statusId="{{ $payment->status_id }}" /></td>
                            </tr>
                            <tr>
                                <th>{{ __("Created At") }}</th>
                                <td>{{ $payment->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection