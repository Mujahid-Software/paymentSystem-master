@php
$statusBadge = [
\App\Models\Status::ADMIN => ['label' => 'Admin', 'class' => 'primary'],
\App\Models\Status::ACTIVE => ['label' => 'Active', 'class' => 'success'],
\App\Models\Status::NOT_ACTIVE => ['label' => 'Not Active', 'class' => 'warning'],
\App\Models\Status::BLOCKED => ['label' => 'Blocked', 'class' => 'danger'],
\App\Models\Status::SUCCESSFULL => ['label' => 'Successfull', 'class' => 'success'],
\App\Models\Status::FAILED => ['label' => 'Faild', 'class' => 'danger'],
];
@endphp

<span class="mt-2 badge bg-{{ $statusBadge[$statusId]['class'] ?? 'danger' }}-subtle text-{{$statusBadge[$statusId]['class']}}">
    {{ __($statusBadge[$statusId]['label']) ?? __('Unknown') }}
</span>