@extends('lawyers.layout')
@push('css')
<style>
    .usertab-list li {
        width: 100%
    }
    .consulation{
        box-shadow: 0px 0px 15px grey;
        padding: 15px;
        border-radius: 16px;
    }

</style>
@endpush
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">الإستشارات</h1>
</div>
@endpush

@section('page')
    @livewire('consulations', ['consulations' => $consulations ])
@endsection
