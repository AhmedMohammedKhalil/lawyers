@extends('lawyers.layout')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">قبول الحجز</h1>
</div>
@endpush

@section('page')


<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">حجز المواعيد</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12">
                <div class=" m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">قبول الحجز</h3>
                    </div>
                    <div class="card-body">
                        @livewire('lawyer.accept-booking', ['booking_id'=>$booking->id])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
