@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Subscription Plan Details")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Subscription Plan Details"), "title" => __("Subscription Plan Details")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <th>{{ __("ID") }}</th>
                                <td>{{ $subscriptionPlan->id }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Name") }}</th>
                                <td>{{ $subscriptionPlan->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Association Name") }}</th>
                                <td>{{ $subscriptionPlan->association_name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Status") }}</th>
                                <td><x-dashboard.table-status-badge statusId="{{ $subscriptionPlan->status_id }}" /></td>
                            </tr>
                            <tr>
                                <th>{{ __("Created At") }}</th>
                                <td>{{ $subscriptionPlan->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
