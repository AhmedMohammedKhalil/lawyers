@extends('lawyers.layout')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">الإعدادات</h1>
</div>
@endpush

@section('page')
<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">الإعدادات</h3>
    </div>
    <div class="card-body">
        <div class="settings-tab">
            <div class="tab-content">
                <div class="tab-pane active show" id="tab1">
                    @livewire('user.auth.settings')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
