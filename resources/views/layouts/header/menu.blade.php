<!-- Mobile Header -->
<div class="sticky">
    <div class="horizontal-header clearfix ">
        <div class="container">
            <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
            <span class="smllogo"><img style="height: 80px" src="{{asset('assets/images/brand/logo1.png')}}" width="120" alt="img" /></span>
            <span class="smllogo-white"><img style="height: 80px" src="{{asset('assets/images/brand/logo.png')}}" width="120"
                    alt="img" /></span>
        </div>
    </div>
</div>
<!-- /Mobile Header -->

<!--Horizontal-main -->
<div class="horizontal-main header-style1  bg-dark-transparent clearfix p-0">
    <div class="horizontal-mainwrapper container d-md-flex align-items-center justify-content-between">
        <div class="desktoplogo">
            <a href="{{route('home')}}"><img src="{{asset('assets/images/brand/logo1.png')}}" alt="img" style="height: 80px">
                <img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img header-white" alt="logo" style="height: 80px">
            </a>
        </div>
        <div class="desktoplogo-1">
            <a href="{{route('home')}}"><img src="{{asset('assets/images/brand/logo.png')}}" alt="img" style="height: 80px"></a>
        </div>
        <nav class="horizontalMenu d-md-flex">
            <ul class="horizontalMenu-list">
                <li aria-haspopup="true"><a class="@if(Request::is('home/*') || Request::is('/')) active @endif"
                        href="{{route('home')}}">الصفحة الرئيسية</a>
                </li>
                <li aria-haspopup="true"><a class="@if(Request::is('search/*') || Request::is('search')) active @endif"
                        href="{{ route('search') }}">بحث</a>
                </li>
                @unless(Auth('admin')->check() || Auth('user')->check() || Auth('lawyer')->check())
                <li aria-haspopup="true" class="p-0 mt-1">
                    <span><a class="btn btn-primary" href="{{ route('user.login_register') }}"><i class="fe fe-user me-1"></i>المستخدم</a></span>
                </li>
                <li aria-haspopup="true" class="p-0 mt-1 ms-3">
                    <span><a class="btn btn-primary" href="{{ route('lawyer.login_register') }}"><i class="fe fe-user me-1"></i>المحامى</a></span>
                </li>
                <li aria-haspopup="true" class="p-0 mt-1 ms-3">
                    <span><a class="btn btn-primary" href="{{ route('admin.login') }}"><i class="fe fe-user me-1"></i>الأدمن</a></span>
                </li>
                @endunless
            </ul>
        </nav>
    </div>
</div>
