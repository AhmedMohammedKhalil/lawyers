@extends('layouts.app')
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">{{ $spec->title }}</h1>
</div>
@endpush
@section('content')


    {{-- all lawyers --}}
    @if($spec->lawyers->count() > 0)
        <section>
            <hr class="border-0">
            <div class="section-title d-md-flex">
                <div>
                    <h2>المحاميين</h2>
                </div>
            </div>
            <div class="row task-widget">
                @foreach ($spec->lawyers as $l)
                    <div class="col-xl-4 col-md-12">
                        <div class="card">
                            <div class="item-card">
                                <div class="item-card-desc">
                                    <a href="{{ route('lawyer.details',['id' => $l->id]) }}"></a>
                                    <div class="item-card-img">
                                        @if($l->image == null)
                                            @if($l->gender == 'ذكر')
                                                <img src="{{asset('assets/images/data/lawyers/male.jpg')}}" alt="img" class="">
                                            @else
                                                <img src="{{asset('assets/images/data/lawyers/female.jpg')}}" alt="img" class="">
                                            @endif
                                        @else
                                            <img src="{{asset('assets/images/data/lawyers/'.$l->id.'/'.$l->image)}}" alt="img"class="">
                                        @endif
                                    </div>
                                </div>
                                <div class="item-card-btn data-1" style="font-size: 30px">
                                    <a href="{{ route('lawyer.details',['id' => $l->id]) }}" class="mb-0 text-center text-white">{{ $l->name }}</a>
                                    <span class="text-white">{{ $l->job_title }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>
    @endif
@endsection
