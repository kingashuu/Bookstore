<x-public-layout>
    <main id="main" class="main-site left-sidebar">

        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>books</span></li>
                </ul>

            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget mercado-widget categories-widget">
                        <h2 class="widget-title">All Categories</h2>
                        <div class="widget-content">
                            <ul class="list-category list-style vertical-list list-limited">
                                @foreach ($categories as $category)
                                    <li class="category-item has-child-cate list-item">
                                        <a href="/books/?category={{ $category->slug }}"
                                            class="cate-link">{{ ucwords($category->name) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Categories widget-->
                    {{-- <div class="widget mercado-widget filter-widget price-filter">
						<h2 class="widget-title">Price</h2>
						<div class="widget-content">
							<div id="slider-range"></div>
							<p>
								<label for="amount">Price:</label>
								<input type="text" id="amount" readonly>
								<button class="filter-submit">Filter</button>
							</p>
						</div>
					</div>
					<!-- Price--> --}}

                    <div class="widget mercado-widget widget-product">
                        <h2 class="widget-title">Popular Books</h2>
                        <div class="widget-content">
                            <ul class="products">
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail" ">
                                            <a href="detail.html"
                                                title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                                <figure><img
                                                        src="{{ asset('assets/public/images/products/digital_01.jpg') }}"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker...</span></a>
                                            <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- brand widget-->

                </div>
                <!--end sitebar-->

                <livewire:public.books />
                <!--end main products area-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </main>
</x-public-layout>
