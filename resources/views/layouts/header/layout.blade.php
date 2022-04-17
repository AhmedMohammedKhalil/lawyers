@push('css')
    <style>
        .bg-background-1:before,
        .banner1:before {
            background: rgb(40, 40, 52, 0.9) !important;
        }

        .bg-background-1 .top-bar,
        .banner1 .top-bar {
            border-bottom: 1px solid rgba(255, 255, 255, 0.6) !important;
        }

    </style>
@endpush

<div class="header-main">
    <!--Section-->
    @hasSection('background')
        @yield('background')
    @else
        <div class="cover-image bg-background-1" data-bs-image-src="{{ asset('assets/images/banners/banner1.jpg') }}">
        @endif
        <!--Topbar-->
        <div class="header-main">
            @if (auth('admin')->check() || auth('user')->check() || auth('lawyer')->check())
                @include('layouts.header.auth')
            @endif
            @include('layouts.header.menu')
        </div>
        <!--/Horizontal-main -->
        <section>
            <div class="sptb-2 bannerimg">
                <div class="header-text mb-0">
                    <div class="container">
                        @stack('title')
                    </div>
                </div>
            </div>
        </section>
        {{-- @include('layout.common.header_content') --}}
    </div>
</div>
