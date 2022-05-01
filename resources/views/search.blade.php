@extends('layouts.app')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">إبحث عن المحامين</h1>
</div>
@endpush

@section('content')
    <section>
        <div class="col-xl-7 col-lg-8 col-md-8 d-block mx-auto">
            <div class="search-background bg-transparent">
                @livewire('search',['lawyers'=>$lawyers])
            </div>
        </div>
    </section>
    <section>
        <section>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="wideget-user ">
                                @livewire('lawyers')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    </section>
@endsection
