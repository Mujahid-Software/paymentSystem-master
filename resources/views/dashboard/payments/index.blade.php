@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Payments")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Projects")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <div class="mb-0 flex-grow-1">
                    <div class="col-3 custom-table-search">
                        <form action="" method="GET" class="mb-0">
                            <input type="text" name="search" class="form-control search" id="search" placeholder="{{ __("Type a Keyword...") }}">
                        </form>
                    </div>
                </div>
                
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap table-striped-columns mb-3">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __("ID") }}</th>
                                <th>{{ __("Transaction ID") }}</th>
                                <th>{{ __("Subscription Plan") }}</th>
                                <th>{{ __("Period") }}</th>
                                <th>{{ __("Amount") }}</th>
                                <th>{{ __("Payment Method") }}</th>
                                <th>{{ __("Customer Name") }}</th>
                                <th scope="col">{{ __("Status") }}</th>
                                <th scope="col">{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                            <form id="form{{ $payment->id }}" action="{{ route('dashboard.payments.destroy', $payment->id) }}" method="post" class="hidden">
                                @csrf
                                @method('delete')
                            </form>
                            <tr>
                                <td><a href="#" class="fw-semibold">{{ $payment->id }}</a></td>
                                <td>{{ $payment->transaction_id }}</td>
                                <td>{{ $payment->subscriptionPlan->name }}</td>
                                <td>{{ $payment->period }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->payment_method }}</td>
                                <td>{{ $payment->customer_name }}</td>
                                <td> <x-dashboard.table-status-badge statusId="{{ $payment->status_id }}" /> </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="edit">
                                            <a href="{{ route('dashboard.payments.show', $payment->id) }}" class="btn btn-icon btn-info show-item-btn" title="{{__('Show')}}"><i class="ri-eye-line"></i></a>
                                        </div>
                                        <div class="remove">
                                            <button class="btn btn-icon btn-danger remove-item-btn" title="{{__('Delete')}}" data-id="{{ $payment->id }}"><i class="bx bx-trash"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $payment->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $payment->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $payment->id }}">
                                                {{ __("Confirm Deletion") }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mt-3">
                                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                                <div class="mt-4 pt-2 fs-15 mx-5">
                                                    <h4>{{ __("Are you Sure ?") }}</h4>
                                                    <p class="text-muted mx-4 mb-0">{{ __("Are you Sure You want to Delete this item?") }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("Cancel") }}</button>
                                            <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('form{{ $payment->id }}').submit();">
                                                {{ __("Delete") }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Delete Modal -->
                            @empty
                        </tbody>

                        <tr>
                            <th colspan="4" class="text-center">{{ __("No items found!") }}</th>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <x-dashboard.pagination :model="$payments" />
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>

@endsection

@section("scripts")
<script src="{{ asset('dashboard/assets/libs/prismjs/prism.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('dashboard/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{asset('dashboard/assets/js/actions/delete-items.js')}}"></script>


@endsection