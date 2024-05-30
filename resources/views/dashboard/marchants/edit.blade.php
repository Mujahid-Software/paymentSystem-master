@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Edit Marchant")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Dashboard"), "title" => __("Edit Marchant")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __("Edit Marchant") }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.marchants.update', $marchant->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __("Name") }}</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $marchant->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="identity_number" class="form-label">{{ __("Identity Number") }}</label>
                        <input type="text" class="form-control" id="identity_number" name="identity_number" value="{{ $marchant->identity_number }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="bank_name" class="form-label">{{ __("Bank Name") }}</label>
                        <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $marchant->bank_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="iban" class="form-label">{{ __("IBAN") }}</label>
                        <input type="text" class="form-control" id="iban" name="iban" value="{{ $marchant->iban }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="commercial_registration_file" class="form-label">{{ __("Commercial Registration File") }}</label>
                        <input type="file" class="form-control" id="commercial_registration_file" name="commercial_registration_file">
                        @if($marchant->commercial_registration_file)
                        <a href="{{ asset('storage/' . $marchant->commercial_registration_file) }}" target="_blank">{{ __("View Current File") }}</a>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="tax_registration_file" class="form-label">{{ __("Tax Registration File") }}</label>
                        <input type="file" class="form-control" id="tax_registration_file" name="tax_registration_file">
                        @if($marchant->tax_registration_file)
                        <a href="{{ asset('storage/' . $marchant->tax_registration_file) }}" target="_blank">{{ __("View Current File") }}</a>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="business_license" class="form-label">{{ __("Business License") }}</label>
                        <input type="text" class="form-control" id="business_license" name="business_license" value="{{ $marchant->business_license }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="agent_authorization" class="form-label">{{ __("Agent Authorization") }}</label>
                        <input type="text" class="form-control" id="agent_authorization" name="agent_authorization" value="{{ $marchant->agent_authorization }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __("Update Marchant") }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
