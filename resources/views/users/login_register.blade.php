@extends('layouts.app')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">المستخدم</h1>
</div>
@endpush

@section('content')
<hr>
<div class="row">
    <div class="col-lg-5 col-xl-5 col-md-6 d-block mx-auto">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-md-12 register-right">
                <ul class="nav nav-tabs nav-justified mb-5 p-2 border" id="myTab" role="tablist">
                    <li class="nav-item me-3">
                        <a class="nav-link m-1 border  active fs-20 font-weight-bold" id="login-tab" data-bs-toggle="tab"
                            href="#login" role="tab" aria-controls="login" aria-selected="true">تسجيل الدخول</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link m-1 border  fs-20 font-weight-bold" id="register-tab"
                            data-bs-toggle="tab" href="#register" role="tab" aria-controls="register"
                            aria-selected="false">إنشاء حساب</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <div class="card">
                            <div class="card-body p-6">
                                <div class="mb-6">
                                    <h5 class="fs-25 font-weight-semibold">تسجيل الدخول</h5>
                                </div>
                                <div class="single-page customerpage">
                                    <div class="wrapper wrapper2 box-shadow-0">
                                        @livewire('user.auth.login')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show " id="register" role="tabpanel" aria-labelledby="register-tab">
                        <div class="card">
                            <div class="card-body p-6">
                                <div class="mb-6">
                                    <h5 class="fs-25 font-weight-semibold">تسجيل الدخول</h5>
                                </div>
                                <div class="single-page customerpage">
                                    <div class="wrapper wrapper2 box-shadow-0">
                                        @livewire('user.auth.register')
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


