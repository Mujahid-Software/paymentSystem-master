@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Edit Subscription Plan")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Edit Subscription Plan"), "title" => __("Edit Plan")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __("Edit Plan") }}</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <!-- Form for editing a subscription plan -->
                <form action="{{ route('dashboard.subscriptionPlans.update', $subscriptionPlan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6 col-12">
                            <label for="name" class="form-label">{{ __("Name") }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __("Enter plan name") }}" value="{{ old('name', $subscriptionPlan->name) }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="description" class="form-label">{{ __("Description") }}</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="{{ __("Enter plan description") }}" required>{{ old('description', $subscriptionPlan->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 col-12">
                            <label for="association_name" class="form-label">{{ __("Association Name") }}</label>
                            <input type="text" class="form-control @error('association_name') is-invalid @enderror" id="association_name" name="association_name" placeholder="{{ __("Enter association name") }}" value="{{ old('association_name', $subscriptionPlan->association_name) }}" required>
                            @error('association_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="status_id" class="form-label">{{ __("Status") }}</label>
                            <select required class="form-select" id="status_id" name="status_id">
                                <option value="">{{__('Select Status')}}</option>
                                @foreach(\App\Models\SubscriptionPlan::STATUSES as $id => $name)
                                <option value="{{ $id }}" {{ old('status_id', $subscriptionPlan->status_id) == $id ? 'selected' : '' }}>{{ __($name) }}</option>
                                @endforeach
                            </select>
                            @error('status_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6 col-12">
                            <label class="form-label">{{ __("Price") }}</label>
                            <div class="d-flex mb-2">
                                <input type="number" class="form-control" name="price" placeholder="{{ __('Price') }}" value="{{$subscriptionPlan->price}}">
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-danger" id="errorPrices"></div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div id="featuresRepeater" class="mt-0">
                                <label class="form-label">{{ __("Features") }}</label>
                                <div class="repeater">
                                    @forelse ($subscriptionPlan->features as $index => $feature)
                                    <div class="d-flex mb-2">
                                        <input type="text" class="form-control mr-2" name="features[{{ $index }}][name]" placeholder="{{ __('Feature Name') }}" value="{{ old('features.' . $index . '.name', $feature['name'] ?? '') }}">
                                        <select required class="form-select" id="status_id" name="features[{{ $index }}][status_id]">
                                            <option value="">{{__('Select Status')}}</option>
                                            @foreach(\App\Models\SubscriptionPlanFeature::STATUSES as $id => $name)
                                            <option value="{{ $id }}" {{ old('features.' . $index . '.status_id', $feature['status_id'] ?? '') == $id ? 'selected' : '' }}>{{ __($name) }}</option>
                                            @endforeach
                                        </select>
                                        <button data-repeater-delete type="button" class="btn btn-outline-danger btn-sm">{{ __('Delete') }}</button>
                                    </div>
                                    @empty
                                    <div class="d-flex mb-2">
                                        <input type="text" class="form-control mr-2" name="features[0][name]" placeholder="{{ __('Feature Name') }}" value="{{ old('features.0.name') }}">
                                        <select class="form-select" id="status_id" name="features[0][status_id]">
                                            <option value="">{{__('Select Status')}}</option>
                                            @foreach(\App\Models\SubscriptionPlanFeature::STATUSES as $id => $name)
                                            <option value="{{ $id }}" {{ old('features.0.status_id') == $id ? 'selected' : '' }}>{{ __($name) }}</option>
                                            @endforeach
                                        </select>
                                        <button data-repeater-delete type="button" class="btn btn-outline-danger btn-sm">{{ __('Delete') }}</button>
                                    </div>
                                    @endforelse
                                </div>
                                <div class="text-danger" id="errorFeatures"></div>
                                <button id="addFeatureBtn" type="button" class="btn btn-outline-primary btn-sm mt-2">{{ __('Add Feature') }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" id="submitButton">{{ __("Submit") }}</button>
                    </div>
                </form>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('dashboard/assets/js/pages/select2.init.js')}}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Repeater JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>


<script>
    $(document).ready(function() {
        // Handle form submission
        $('#submitButton').click(function() {
            // Handle repeaters
            checkAndHandleEmptyRepeater('#featuresRepeater', 'features');
            $('form').submit();
        });

        // Template for features
        var featureTemplate = $('#featuresRepeater .repeater').eq(0).clone();

        // Handle add feature button
        $('#addFeatureBtn').on('click', function() {
            handleAddButton(featureTemplate, '#featuresRepeater', 'features');
        });

        // Handle delete feature button
        $('#featuresRepeater').on('click', 'button[data-repeater-delete]', function() {
            handleDeleteButton($(this), $(this).closest('.repeater'));
        });

        // Function to handle add button click
        function handleAddButton(template, repeaterId, hiddenInputName) {
            var newTemplate = template.clone();
            newTemplate.find('input, select').val('');
            $(repeaterId).append(newTemplate);
            updateInputNames($(repeaterId + ' .repeater'));
        }

        // Function to handle delete button click
        function handleDeleteButton(button, repeater) {
            repeater.slideUp(function() {
                $(this).remove();
                // Update input field names after deleting
                updateInputNames($(button).closest('.repeater').siblings('.repeater'));
            });
        }

        // Function to update input field names with unique indices
        function updateInputNames(repeaters) {
            repeaters.each(function(index, element) {
                $(element).find('input, select').each(function() {
                    var name = $(this).attr('name');
                    name = name.replace(/\[(\d+)\]/, '[' + index + ']');
                    $(this).attr('name', name);
                });
            });
        }

        // Function to check and handle empty repeaters
        // Function to check and handle empty repeaters
        function checkAndHandleEmptyRepeater(repeaterId, hiddenInputName) {
            var repeater = $(repeaterId + ' .repeater');
            var isEmpty = true;

            // Check if any input within the repeater has a non-null value
            repeater.each(function(index, element) {
                $(element).find('input, select').each(function() {
                    if ($(this).val() !== '') {
                        isEmpty = false;
                        return false; // Exit the loop if a non-null value is found
                    }
                });
            });

            // If the repeater is empty, add a hidden input with null value
            if (repeater.length === 0 || isEmpty) {
                $('<input>').attr({
                    type: 'hidden',
                    name: hiddenInputName,
                    value: null
                }).appendTo('form');
            }
        }

    });
</script>
@endsection