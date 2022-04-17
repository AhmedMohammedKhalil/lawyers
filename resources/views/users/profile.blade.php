@extends('users.layout')
@push('css')
<style>
    .usertab-list li {
        width: 100%
    }
</style>
@endpush
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">الصفحة الشخصية</h1>
</div>
@endpush

@section('page')
<div class="card mb-0">
    <div class="card-body">
        <div class="profile-log-switch">
            <div class="media-heading">
                <h3 class="card-title mb-3 font-weight-bold">المعلومات الشخصية</h3>
            </div>
            <ul class="usertab-list">
                <li><span class="font-weight-bold text-default-dark float-start">الإسم :
                        </span> <span class="user-1 ms-2"> {{auth('user')->user()->name}}</span></li>
                <li><span class="font-weight-bold text-default-dark float-start">الإيميل :
                        </span> <span class="user-1 ms-2"> {{auth('user')->user()->email}}</span></li>
                <li><span class="font-weight-bold text-default-dark float-start">الموبايل :
                        </span> <span class="user-1 ms-2"> {{auth('user')->user()->phone}}</span></li>
                <li><span class="font-weight-bold text-default-dark float-start">الجنس :
                        </span> <span class="user-1 ms-2"> {{auth('user')->user()->gender}}</span></li>
                <li><span class="font-weight-bold text-default-dark float-start">العنوان :
                        </span><p class="d-inline-block mx-2">{{ nl2br(auth('user')->user()->address) }}</p></li>
            </ul>
        </div>
    </div>
</div>
@endsection
