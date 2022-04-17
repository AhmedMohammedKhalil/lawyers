@extends('admins.layout')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">لوحة تحكم التخصصات</h1>
</div>
@endpush

@section('page')


<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">التخصصات</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12">
                <div class=" m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">تعديل التخصص</h3>
                    </div>
                    <div class="card-body">
                        @livewire('admin.specialization.edit', ['spec'=>$spec])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
