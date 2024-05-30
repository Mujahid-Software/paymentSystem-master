@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Add Marchant")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Dashboard"), "title" => __("Add Marchant")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __("Add New Marchant") }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.marchants.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __("Name") }}</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="identity_number" class="form-label">{{ __("Identity Number") }}</label>
                        <input type="text" class="form-control" id="identity_number" name="identity_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="iban" class="form-label">{{ __("Phone") }}</label>
                        <input type="text" class="form-control" id="Phone" name="Phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="bank_name" class="form-label">{{ __("Bank Name") }}</label>
                        <input type="text" class="form-control" id="bank_name" name="bank_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="iban" class="form-label">{{ __("IBAN") }}</label>
                        <input type="text" class="form-control" id="iban" name="iban" required>
                    </div>
                    <div class="mb-3">
                        <label for="commercial_registration_file" class="form-label">{{ __("Commercial Registration File") }}</label>
                        <input type="file" class="form-control" id="commercial_registration_file" name="commercial_registration_file" required>
                    </div>
                    <div class="mb-3">
                        <label for="tax_registration_file" class="form-label">{{ __("Tax Registration File") }}</label>
                        <input type="file" class="form-control" id="tax_registration_file" name="tax_registration_file" required>
                    </div>
                    <div class="mb-3">
                        <label for="business_license" class="form-label">{{ __("Business License") }}</label>
                        <input type="text" class="form-control" id="business_license" name="business_license" required>
                    </div>
                    <div class="mb-3">
                        <label for="agent_authorization" class="form-label">{{ __("Agent Authorization") }}</label>
                        <input type="text" class="form-control" id="agent_authorization" name="agent_authorization" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __("Add Marchant") }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
