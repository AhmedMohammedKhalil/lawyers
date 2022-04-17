@extends('layouts.app')
@section('landing')
    <div class="banner1 relative banner-top">
        <!-- Carousel -->
        <div class="owl-carousel bannner-owl-carousel slider slider-header ">
            <div class="item cover-image" data-bs-image-src="" style="width: 100vw">
                <img alt="first slide" style="height: 80vh" src="{{ asset('assets/images/banners/slide-1.jpg') }}">
            </div>
            <div class="item" style="width: 100vw">
                <img alt="first slide" style="height: 80vh" src="{{ asset('assets/images/banners/silde-2.jpg') }}">
            </div>
            <div class="item" style="width: 100vw">
                <img alt="first slide" style="height: 80vh" src="{{ asset('assets/images/banners/slide-3.jpg') }}">
            </div>
        </div>
        <!--Topbar-->
        <div class="header-main">
            @if (Auth('admin')->check() || Auth('user')->check() || Auth('lawyer')->check())
                @include('layouts.header.auth')
            @endif
            @include('layouts.header.menu')

        </div>
        <!--/Horizontal-main -->
        <!--Section-->
        @include('layouts.header.content')

        <!--/Section-->


    </div>
@endsection

@section('content')
    {{-- all specializatopn --}}
    <section class="pt-5">
        <div class="container">
            <div class="section-title d-md-flex">
                <div>
                    <h2>التخصصات</h2>
                </div>
            </div>
            <div class="row text-center">
                @foreach ($specs as $spec)
                    <div class="col-lg-4 col-md-6 col-sm-6 overflow-hidden mb-3">
                        <a href="{{ route('specialization.lawyers',['id' => $spec->id]) }}">
                            <div class="card bg-white br-7 p-5 mb-lg-0">
                                <div class="icon-bg about">
                                    <img class="rounded-3" src="{{ asset('assets/images/png/spec.jpg') }}" alt="">
                                </div>
                                <div class="servic-data mt-3">
                                    <h4 class="font-weight-semibold mb-2">{{ $spec->title }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

    {{-- all lawyers --}}
    <section>
        <hr class="border-0">
        <div class="section-title d-md-flex">
            <div>
                <h2>المحاميين</h2>
            </div>
        </div>
        <div class="row task-widget">
            @foreach ($lawyers as $l)
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

@endsection
