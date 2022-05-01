@extends('layouts.app')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">إضافة إستشارة</h1>
</div>
@endpush

@section('content')

    <div class="col-xl-6" style="margin: 50px auto">
        <div class=" m-b-20">
            <div class="card-header justify-content-center">
                <h3 class="card-title">إضافة إستشارة جديد</h3>
            </div>
            <div class="card-body">
                @livewire('user.consulations.add', ['lawyer_id' => $lawyer_id])
            </div>
        </div>
    </div>
@endsection
