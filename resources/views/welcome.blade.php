<x-public-layout>
    <main id="main">
        <div class="container">
            <!--MAIN SLIDE-->
            <x-public.slide :Sliders="$Sliders" />

            <!--BANNER-->
            {{-- <div class="wrap-banner style-twin-default">
                <div class="banner-item">
                    <a href="#" class="link-banner banner-effect-1">
                        <figure><img src="{{ asset('assets/public/images/home-1-banner-1.jpg') }}" alt=""
                                width="580" height="190"></figure>
                    </a>
                </div>
                <div class="banner-item">
                    <a href="#" class="link-banner banner-effect-1">
                        <figure><img src="{{ asset('assets/public/images/home-1-banner-2.jpg') }}" alt=""
                                width="580" height="190"></figure>
                    </a>
                </div>
            </div> --}}


            <!--Latest Products-->
            <div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">Latest Books</h3>
                {{-- <div class="wrap-top-banner">
                    <a href="#" class="link-banner banner-effect-2">
                        <figure>
                            <img src="{{ asset('assets/public/images/digital-electronic-banner.jpg') }}" width="1170"
                                height="240" alt="">
                        </figure>
                    </a>
                </div> --}}
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="digital_1a">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                    data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>


                                    @foreach ($books as $book)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail"
                                                style="max-height: 232px; max-width: 232px; margin-bottom: 15px">
                                                <a href="books/{{ $book->slug }}" title="{{ $book->title }}">
                                                    <figure><img src="{{ asset('storage/' . $book->cover_image) }}"
                                                            width="800" height="800" alt="{{ $book->title }}">
                                                    </figure>
                                                </a>
                                                {{-- <div class="group-flash">
												<span class="flash-item new-label">new</span>
											     </div> --}}
                                                <div class="wrap-btn">
                                                    <a href="{{ route('books.download', ['id' => $book->id]) }}"
                                                        class="function-link">Download
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <a href="books/{{ $book->slug }}"
                                                    class="product-name"><span>{{ $book->title }}</span>
                                                </a>
                                                <div class="wrap-price">
                                                    <span class="product-price">

                                                        <a href="/books/?category={{ $book->category->slug }}">
                                                            {{ $book->category->name }}
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <h3 class="title-box">Popular Books</h3>
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="digital_1a">
                                 <style>
                        .cards {
                            display: grid;
                            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                            gap: 20px
                        }
                    </style>
                                <div class="wrap-products cards">


                                    @foreach ($books as $book)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail"
                                                style="max-height: 232px; max-width: 232px; margin-bottom: 15px">
                                                <a href="books/{{ $book->slug }}" title="{{ $book->title }}">
                                                    <figure><img src="{{ asset('storage/' . $book->cover_image) }}"
                                                            width="800" height="800" alt="{{ $book->title }}">
                                                    </figure>
                                                </a>
                                                {{-- <div class="group-flash">
												<span class="flash-item new-label">new</span>
											     </div> --}}
                                                <div class="wrap-btn">
                                                    <a href="{{ route('books.download', ['id' => $book->id]) }}"
                                                        class="function-link">Download
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="product-info">
                                                <a href="books/{{ $book->slug }}"
                                                    class="product-name"><span>{{ $book->title }}</span>
                                                </a>
                                                <div class="wrap-price">
                                                    <span class="product-price">

                                                        <a href="/books/?category={{ $book->category->slug }}">
                                                            {{ $book->category->name }}
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Product Categories-->
            {{-- <div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">Product Categories</h3>

                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-control">
                            @foreach ($categories as $category)

                                <a href="#{{ $category->slug }}"
                                    class="tab-control-item active">{{ $category->name }}</a>
                            @endforeach
                        </div>
                        <div class="tab-contents">

                            <div class="tab-content-item active" id="{{$category->slug }}">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                    data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                    @foreach ($books as $book)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="detail.html"
                                                    title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                    <figure><img src="{{ asset('storage/' . $book->cover_image) }}"
                                                            width="800" height="800"
                                                            alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="#"
                                                    class="product-name"><span>{{ $book->title }}</span></a>
                                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> --}}

        </div>


    </main>
</x-public-layout>
