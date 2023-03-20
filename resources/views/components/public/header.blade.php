<!-- mobile menu -->

@props(['categories']);
<div class="mercado-clone-wrap">
    <div class="mercado-panels-actions-wrap">
        <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
    </div>
    <div class="mercado-panels"></div>
</div>
<!--header-->
<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="mid-section main-info-area">
                    <div class="wrap-logo-top left-section">
                        <a href="/" class="link-to-home">
                            {{-- <img src="{{ asset('/assets/public/images/logo-top.png') }}" alt="mercado"></a> --}}
                            <x-jet-authentication-card-logo />
                    </div>
                    <div class="wrap-search center-section">
                        <div class="wrap-search-form">
                            <form action="{{ route('search') }}" method="GET" id="form-search-top" name="form-search-top">
                                @csrf
                                 @if (request('category'))

                                    <input type="hidden" name="category" value="{{request('category')}}">
                                    @endif
                                <input type="text" name="search" value="{{request('search')}}" placeholder="Search here...">
                                <button form="form-search-top" type="submit"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                                <div class="wrap-list-cate">

                                    <a href="/books" class="link-control">All Category</a>

                                    <ul class="list-cate">

                                        <li class="level-0">All Category</li>
                                        @php
                                            $categories = App\Models\Category::all();
                                        @endphp

                                        @foreach ($categories as $category)
                                            <li class="level-1">
                                                <a href="/search/?category={{ $category->slug }}&{{http_build_query(request()->except('category'))}}" style=" color: #606060;">
                                                {{-- <a href="/categories/{{ $category->name }}"> --}}
                                                    {{ $category->name }}

                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="wrap-icon right-section">

                        <div class="d-flex justify-content-end ">
                            @if (Route::has('login'))
                                <div class="">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="text-muted">Log in</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ms-4 text-muted">Register</a>
                                        @endif
                                @endif
                            </div>
                            @endif
                        </div>

                    </div>

                </div>
            </div>

            <div class="nav-section header-sticky">

                <div class="primary-nav-section">
                    <div class="container">
                        <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                            <li class="menu-item home-icon">
                                <a href="/" class="link-term mercado-item-title"><i class="fa fa-home"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('public.book') }}" class="link-term mercado-item-title">Book</a>
                            </li>

                            <li class="menu-item">
                                <a href="{{ route('Contact-us') }}" class="link-term mercado-item-title">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>
