@props(['Sliders'])
<div class="wrap-main-slide">
    <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
        @foreach ($Sliders as $slide)

        <div class="item-slide">
            {{-- <img src="{{ asset('assets/public/i mages/main-slider-1-3.jpg') }}" alt="" class="img-slide"> --}}
            <img src="{{ asset('storage/' . $slide->image) }}" alt="" class="img-slide">
            <div class="slide-info slide-3">
                <h2 class="f-title">{{$slide->title}}.</b></h2>
                <span class="f-subtitle">{{$slide->sub_title}}.</span><br>

                <a href="{{$slide->url_link}}" class="btn btn-link mt-5 ms-3">See Now</a>

            </div>
        </div>
        @endforeach

    </div>
</div>
