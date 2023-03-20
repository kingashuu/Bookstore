<x-public-layout>
    <!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Search</span></li>
				</ul>
                <h5><span class="item-link" style="margin-bottom: 14px; padding-bottom: 20px">Showing {{ $books->firstItem() }} - {{ $books->lastItem() }} of {{ $books->total() }}</span></h5>
			</div>
			<div class="row">
				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                    @foreach ($books as $book)
					<div class="wrap-product-detail">
						<div class="detail-media">
							<div class="product-gallery">


							    <a href="/books/{{ $book->slug }}" data-thumb="assets/images/products/digital_18.jpg">
							    	<img width="300" src="{{ asset('storage/' . $book->cover_image) }}" alt="product thumbnail" />
							    </a>

							</div>
						</div>
						<div class="detail-info">
                            <a href="/books/{{ $book->slug }}">

                                <h2 class="product-name">{{$book->title}}</h2>
                            </a>
                            <div class="short-desc">
                                <p>{{$book->Short_description}}</p>
                                <p>published by <b>{{ $book->publisher }}</b></p>

                            </div>

                            <div class="stock-info in-stock">
                                 <p class="availability">by <b>{{ $book->authorName }}</b> </p>
                                 <p class="availability">Category: <a href="/books/?category={{ $book->category->slug }}"><b>{{ $book->category->name }}</b>
                                    </a> </p>
                            </div>
							<div class="wrap-butons">
								<a href="#" class="btn add-to-cart">Dwonload</a>

							</div>
						</div>

					</div>
                    @endforeach
				</div><!--end main products area-->
{{-- {{links}} --}}


			</div><!--end row-->

		</div><!--end container-->

	</main>
	<!--main area-->


</x-public-layout>
