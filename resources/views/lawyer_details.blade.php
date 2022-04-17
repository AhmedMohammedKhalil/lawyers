@extends('layouts.app')
@push('css')
    <style>
        .wideget-user-rating,
        .br-widget a{
            font-size: 20px !important
        }

        .br-theme-fontawesome-stars .br-widget a.br-active:after, .br-theme-fontawesome-stars .br-widget a.br-selected:after {
            color: #FFA22B;
        }
    </style>
@endpush
@push('title')
<div class="text-center text-white py-7">
    <h1 class="">تفاصيل المحامى</h1>
</div>
@endpush
@section('content')

<section>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="wideget-user ">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="wideget-user-desc">
                                        <div class="wideget-user-img">
                                            @if ($lawyer->image != null)
                                            <img src="{{asset('assets/images/data/lawyers/'.$lawyer->id.'/'.$lawyer->image)}}"
                                                alt="img">
                                            @else
                                                @if ($lawyer->gender == 'انثى')
                                                    <img src="{{asset('assets/images/data/lawyers/female.jpg')}}" alt="img">
                                                @else
                                                    <img src="{{asset('assets/images/data/lawyers/male.jpg')}}" alt="img">
                                                @endif
                                            @endif
                                        </div>
                                        <div class="user-wrap">
                                            <h3>{{$lawyer->name}}</h3>
                                            <h3>{{$lawyer->job_title}}</h3>
                                            <h3>{{$lawyer->phone}}</h3>
                                            <h3>{{$lawyer->gender}}</h3>
                                            <p class="text-default mb-3">{{nl2br($lawyer->address)}}</p>
                                        </div>
                                            @livewire('user.rate' , ["lawyer"=>$lawyer])
                                        @auth('user')
                                            <div class="btn-list">
                                                <a href="{{ route('user.booking',['id'=>$lawyer->id]) }}" class="btn btn-primary btn-md mb-5 mb-lg-0">حجز ميعاد</a>
                                                <a href="javascript:void(0)" class="btn btn-primary btn-md mb-5 mb-lg-0">طلب استشارة</a>
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    {{-- foreach service --}}
                    <div class="section-title d-md-flex pb-0">
                        <div>
                            <h2>التخصصات</h2>
                        </div>
                    </div>
                    @foreach ($lawyer->specializations as $s)
                    <div class="col-lg-4 col-md-6 item-all-cat  ">
                        <div class="item-all-card text-dark text-center card mb-5">
                            <div class="iteam-all-icon">
                                <h3 class="text-body font-weight-bold mb-2 mt-5">{{$s->title}}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @if($lawyer->services->count() > 0)
                <div class="row text-center">
                    {{-- foreach service --}}
                    <div class="section-title d-md-flex pb-0">
                        <div>
                            <h2>الخدمات</h2>
                        </div>
                    </div>
                    @foreach ($lawyer->services as $s)
                    <div class="col-lg-4 col-md-6 item-all-cat">
                        <div class="item-all-card text-dark text-center card mb-5">
                            <div class="iteam-all-icon">
                                <h3 class="text-body font-weight-bold mb-2 mt-5">{{$s->title}}</h3>
                                <h5 class="text-body font-weight-bold mb-2 mt-5">{{$s->specialization->title}}</h5>
                                <p class="text-body font-weight-bold mb-2 mt-5">{{nl2br($s->details)}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @endif
            </div>
        </div>
    </section>

@endsection
