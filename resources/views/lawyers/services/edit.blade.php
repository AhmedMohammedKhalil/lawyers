@extends('lawyers.layout')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">لوحة تحكم الخدمات</h1>
</div>
@endpush

@section('page')


<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">الخدمات</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12">
                <div class=" m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">تعديل الخدمة</h3>
                    </div>
                    <div class="card-body">
                        @livewire('lawyer.service.edit', ['service'=>$service])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
