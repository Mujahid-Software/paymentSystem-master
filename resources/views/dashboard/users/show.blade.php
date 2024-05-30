@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Users")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Users"), "title" => __("Users")])
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __("ID") }}</th>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Name") }}</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Email") }}</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Phone") }}</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th>{{ __("Status") }}</th>
                                <td><x-dashboard.table-status-badge statusId="{{ $user->status_id }}" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>

@endsection