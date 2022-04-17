@extends('layouts.app')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">الأدمن</h1>
</div>
@endpush

@section('content')
<hr>
<div class="row" style="min-height: calc(53vh - 6px)">
    <div class="col-lg-5 col-xl-5 col-md-6 d-block mx-auto">
        <div class="card">
            <div class="card-body p-6">
                <div class="mb-6">
                    <h5 class="fs-25 font-weight-semibold">تسجيل دخول</h5>
                </div>
                <div class="single-page customerpage">
                    <div class="wrapper wrapper2 box-shadow-0">
                        @livewire('admin.auth.login')
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
