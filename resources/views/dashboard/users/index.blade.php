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
            <div class="card-header align-items-center d-flex">
                <div class="mb-0 flex-grow-1">
                    <div class="col-3 custom-table-search">
                        <form action="" method="GET" class="mb-0">
                            <input type="text" name="search" class="form-control search" id="search" placeholder="{{ __("Type a Keyword...") }}">
                        </form>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <a href="{{route('dashboard.users.create')}}" class="btn btn-soft-info">
                        <i class="ri-add-circle-line align-middle"></i> {{__('Add')}}
                    </a>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap table-striped-columns mb-3">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">{{ __("ID") }}</th>
                                <th scope="col">{{ __("Name") }}</th>
                                <th scope="col">{{ __("Email") }}</th>
                                <th scope="col">{{ __("Phone") }}</th>
                                <th scope="col">{{ __("Status") }}</th>
                                <th scope="col">{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <form id="form{{ $user->id }}" action="{{ route('dashboard.users.destroy', $user->id) }}" method="post" class="hidden">
                                @csrf
                                @method('delete')
                            </form>
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td> <x-dashboard.table-status-badge statusId="{{ $user->status_id }}" /> </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="edit">
                                            @if($user->status_id !== \App\Models\Status::ADMIN)
                                            <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-icon btn-primary edit-item-btn" title="{{__('Edit')}}"><i class="bx bx-edit"></i></a>
                                            @else
                                            <button class="btn btn-icon btn-primary edit-item-btn" title="{{__('Edit')}}" disabled><i class="bx bx-edit"></i></button>
                                            @endif
                                        </div>
                                        <div class="show">
                                            <a href="{{ route('dashboard.users.show', $user->id) }}" class="btn btn-icon btn-info edit-item-btn" title="{{__('Show')}}"><i class="ri-eye-line"></i></a>
                                        </div>
                                        <div class="remove">
                                            @if($user->status_id !== \App\Models\Status::ADMIN)
                                            <button class="btn btn-icon btn-danger remove-item-btn" title="{{__('Delete')}}" data-id="{{ $user->id }}"><i class="bx bx-trash"></i></button>
                                            @else
                                            <button class="btn btn-icon btn-danger remove-item-btn" title="{{__('Delete')}}" data-id="{{ $user->id }}" disabled><i class="bx bx-trash"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="5" class="text-center">{{ __("No items found!") }}</th>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                    <div class="d-flex justify-content-center">
                        <x-dashboard.pagination :model="$users" />
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