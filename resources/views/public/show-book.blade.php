<x-public-layout>
    <!--main area-->
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>books</span></li>
                    <li class="item-link"><span>{{ $book->title }}</span></li>
                </ul>

            </div>

            <div class="row">
                <div class="col-md-5 main-content-area">
                    <div class="detail-media">
                        <div class="product-gallery">
                            <img width="400" src="{{ asset('storage/' . $book->cover_image) }}"
                                alt="product thumbnail" />
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="detail-info">

                        <h2 class="product-name">{{ $book->title }}</h2>
                        <div class="short-desc">
                            <p>{{ $book->Short_description }}</p>
                        </div>
                        <div class="stock-info in-stock">
                            <p class="availability">Category: <a href="#"><b>{{ $book->category->name }}</b>
                                </a> </p>
                        </div>
                        <dl class="row">
                            <dt class="col-sm-2">Author :</dt>
                            <dd class="col-sm-9 text-left">
                                <blockquote class="blockquote">
                                    <p>{{ $book->authorName }}</p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    published at <cite title="Source Title">{{ $book->published_date }}</cite>
                                </figcaption>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-md-2">published by:</dt>
                            <dd class="col-md-9 text-left">
                                {{ $book->publisher }}
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-md-2">pages:</dt>
                            <dd class="col-md-9 text-left">
                                {{ $book->page_number }}
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-md-2">ISBN:</dt>
                            <dd class="col-md-9 text-left">
                                {{ $book->ISBN_number }}
                            </dd>
                        </dl>

                    </div>
                    <div class="wrap-product-detail">
                        <div class="detail-info">
                            <div class="wrap-butons">
                                <a href="{{ route('books.download', ['id' => $book->id]) }}" class="btn add-to-cart"><i
                                        class="fa fa-download" aria-hidden="true"></i>
                                    Dwonload</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-12 main-content-area">
                    <div class="wrap-product-detail">

                        <div class="advance-info">
                            <div class="tab-control normal">
                                <a href="#description" class="tab-control-item active">description</a>
                                <a href="#review" class="tab-control-item">Reviews</a>
                            </div>
                            <div class="tab-contents">
                                <div class="tab-content-item active" id="description">
                                    <p>{{ $book->description }}
                                    </p>
                                </div>
                                <div class="tab-content-item " id="review">

                                    <div class="wrap-review-form">

                                        <div id="comments">
                                            @php
                                                $review =  App\Models\Comment::where('book_id', $book->id)->count()
                                            @endphp
                                            <h2 class="woocommerce-Reviews-title text-capitalize fs-2">{{$review}} reviews</span>

                                                <section class="border border-1 rounded-3 shadow-sm  p-4 my-4 ">
                                                    <form method="POST" action="/books/{{ $book->slug }}/comments"
                                                        class=" ">
                                                        @csrf
                                                        <div class="d-flex py-4  align-items-center mb-4">
                                                            <div class="">
                                                                @auth
                                                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                                    <img class="rounded-circle" width="40"
                                                                        height="40"
                                                                        src="{{ Auth::user()->profile_photo_url }}"
                                                                        alt="{{ Auth::user()->name }}" />
                                                                @else
                                                                    {{ Auth::user()->name }}

                                                                    <svg class="ms-2" width="18"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                @endif
                                                                @endauth
                                                            </div>
                                                            <div class="mb-0 pt-2 ms-3">
                                                                <p class="pt-3 mb-0  fs-3 fw-normal ">Leave Us a Review.
                                                                </p>
                                                            </div>

                                                        </div>
                                                        {{-- form-control md-textarea --}}
                                                        <textarea name="body" type="text" id="form81" class="border-0 w-100 border-bottom 2px"></textarea>
                                                        <div class="d-flex justify-content-end py-4">
                                                            <button type="submit"
                                                                class="btn text-uppercase py-2 px-5 text-white"
                                                                style="background-color:#00abe0">post</button>
                                                        </div>
                                                    </form>
                                                </section>

                                                <div class="py-5 px-4 ">

                                                    <ol class="commentlist">
                                                        @foreach ($book->comments()->latest()->get() as $comment)
                                                            <x-public.comment :comment="$comment" />
                                                        @endforeach
                                                    </ol>
                                                </div>

                                        </div>
                                        <!-- #comments -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </main>
    <!--main area-->


</x-public-layout>
