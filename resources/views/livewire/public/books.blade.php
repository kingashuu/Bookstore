<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">


                    <div class="wrap-shop-control">

                        <h1 class="shop-title">Books</h1>
                        Showing {{ $books->firstItem() }} - {{ $books->lastItem() }} of {{ $books->total() }}
                        <div class="wrap-right">
                            <div class="sort-item orderby ">
                                <select wire:model="sorting" class="use-chosen">
                                    <option value="default" selected="selected">Default sorting</option>
                                    <option value="date">Sort by newness</option>
                                    {{-- <option value="popularity">Sort by popularity</option> --}}
                                    {{-- <option value="rating">Sort by average rating</option> --}}

                                    <option value="by_asc">Sort by title: A-Z</option>
                                    <option value="by_desc">Sort by title: Z-A</option>
                                </select>
                            </div>
                         <div class="sort-item product-per-page">
                                <select wire:model="pagesize" class="use-chosen">
                                    <option value="12" selected="selected">12 per page</option>
                                    <option value="16">16 per page</option>
                                    <option value="18">18 per page</option>
                                    <option value="21">21 per page</option>
                                    <option value="24">24 per page</option>
                                    <option value="30">30 per page</option>
                                    <option value="32">32 per page</option>
                                </select>
                            </div>
                            <div class="change-display-mode">
                                <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>

                            </div>

                        </div>



                    </div>




                    {{-- <h1>{{ $message }}</h1> --}}
                    <!--end wrap shop control-->
                    <div class="row">

                        <ul class="product-list grid-products equal-container">
                            @foreach ($books as $book)
                                <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                                    <div class="product product-style-3 equal-elem ">
                                        <div class="product-thumnail" style="max-height: 232px; max-width: 232px; margin-bottom: 15px">


                                            <a href="/books/{{ $book->slug }}">
                                                <figure>
                                                    <img
                                                    src="{{ asset('storage/' . $book->cover_image) }}"
                                                    class="img-fluid img-thumbnail"
                                                        alt="{{ $book->title }}">
                                                    </figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="/books/{{ $book->slug }}"
                                                class="product-name"><span>{{ $book->title }}</span></a>
                                            <div class="wrap-price"><span class="product-price">
                                                    <a
                                                        href="/books/?category={{ $book->category->slug }}">{{ $book->category->name }}</a>
                                                </span>
                                            </div>
                                            <a href="{{ route('books.download', ['id' => $book->id]) }}"
                                                class="btn add-to-cart">Download</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>

                    {{-- <div class="wrap-pagination-info">
                        <ul class="page-numbers">
                            <li><span class="page-number-item current">1</span></li>
                            <li><a class="page-number-item" href="#">2</a></li>
                            <li><a class="page-number-item" href="#">3</a></li>
                            <li><a class="page-number-item next-link" href="#">Next</a></li>
                        </ul>
                        <p class="result-count">Showing 1-8 of 12 result</p>
                    </div> --}}
                    {{$books->links()}}
                </div>
