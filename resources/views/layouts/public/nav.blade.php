@php
$productCategory = \App\Models\ProductCategory::ByActive()->get();
$pages = \App\Models\Page::ByActive()->get();
@endphp
<header class="header" id="header">
    <nav class="navbar navbar-expand-md navbar-light bg-light menu-header">
        <div class="container-fluid">
            <div class="nav-logo">
                <a href="/"><img class="logo-icon" src="{{asset('html//assets/LOGO UTAMA PT PANDAFOOD 1.svg')}}" /></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                @lang("navbar.menu")
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item nav-menu">
                        <a class="nav-link border-item" href="{{url('')}}/">@lang("navbar.home")</a>
                    </li>
                    <li class="nav-item nav-menu">
                        <a class="nav-link border-item" href="{{url('/company')}}">@lang("navbar.company")</a>
                    </li>
                    <li class="nav-item nav-menu">
                        <a class="nav-link border-item" href="javascript:void(0)" id="btn-2" data-bs-toggle="collapse"
                            data-bs-target="#submenu2" aria-expanded="false">@lang("navbar.products")<span>
                                <img src="{{asset('html/assets/Group 2.svg')}}" alt="">
                            </span> </a>
                        <ul class="collapse sub-menu" id="submenu2" role="menu" aria-labelledby="btn-2">
                            @foreach ($productCategory as $category)
                            <li class="nav-sub-item"><a href="{{url('/product-category/'. $category->slug)}}">{{setProperty($category, 'name')}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item nav-menu">
                        <a class="nav-link border-item" href="{{url('/partnership')}}">@lang("navbar.partnership")</a>
                    </li>
                    <li class="nav-item nav-menu">
                        <a class="nav-link border-item" href="{{url('/career')}}">@lang("navbar.career")</a>
                    </li>
                    @if (count($pages) > 0)
                        <li class="nav-item nav-menu">
                            <a class="nav-link border-item" href="javascript:void(0)" id="btn-2" data-bs-toggle="collapse"
                                data-bs-target="#submenu3" aria-expanded="false">@lang("navbar.other")<span>
                                    <img src="{{asset('html/assets/Group 2.svg')}}" alt="">
                                </span> </a>
                            <ul class="collapse sub-menu" id="submenu3" role="menu" aria-labelledby="btn-2">
                                @foreach ($pages as $page)
                                <li class="nav-sub-item"><a href="{{url('page/'. $page->slug)}}">{{setProperty($page, 'name')}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item nav-flag">
                        @if (app()->getLocale() == 'en')
                        <a class="nav-link" href="/lang/en" id="btn-5" data-bs-toggle="collapse"
                            data-bs-target="#submenu5" aria-expanded="false">
                            <div class="item-flag">
                                <img class="flag-icon" src="{{asset('html/assets/Group 39.svg')}}" />
                                EN
                            </div>
                        </a>
                        @elseif(app()->getLocale() == 'ar')
                        <a class="nav-link" href="/lang/ar" id="btn-5" data-bs-toggle="collapse"
                            data-bs-target="#submenu5" aria-expanded="false">
                            <div class="item-flag">
                                <img class="flag-icon" src="{{asset('html/assets/Group 38.svg')}}" />
                                AR
                            </div>
                        </a>
                        @elseif(app()->getLocale() == 'ch')
                        <a class="nav-link" href="/lang/ch" id="btn-5" data-bs-toggle="collapse"
                            data-bs-target="#submenu5" aria-expanded="false">
                            <div class="item-flag">
                                <img class="flag-icon" src="{{asset('html/assets/Group 37.svg')}}" />
                                CH
                            </div>
                        </a>
                        @else
                        <a class="nav-link" href="/lang/id" id="btn-5" data-bs-toggle="collapse"
                            data-bs-target="#submenu5" aria-expanded="false">
                            <div class="item-flag">
                                <img class="flag-icon" src="{{asset('html/assets/Group 23.svg')}}" />
                                IN
                            </div>
                        </a>
                        @endif
                        <ul class="collapse sub-menu sub-menu-flag" id="submenu5" role="menu" aria-labelledby="btn-5">
                            <li class="nav-sub-item">
                                <a href="/lang/id">
                                    <img class="flag-icon" src="{{asset('html/assets/Group 23.svg')}}" />
                                    IN
                                </a>
                            </li>
                            <li class="nav-sub-item">
                                <a href="/lang/en">
                                    <img class="flag-icon" src="{{asset('html/assets/Group 39.svg')}}" />
                                    EN
                                </a>
                            </li>
                            <li class="nav-sub-item">
                                <a href="/lang/ch">
                                    <img class="flag-icon" src="{{asset('html/assets/Group 37.svg')}}" />
                                    CH
                                </a>
                            </li>
                            <li class="nav-sub-item">
                                <a href="/lang/ar">
                                    <img class="flag-icon" src="{{asset('html/assets/Group 38.svg')}}" />
                                    AR
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>