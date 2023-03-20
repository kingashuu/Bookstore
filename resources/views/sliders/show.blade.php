<x-base-layout>

    <x-slot name="header">
        {{ __('View Sliders') }}

    </x-slot>

    <x-admin.section>
<div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{$slider->title}}</h3>
              <div class="col-md6 text-center">
                {{-- <img alt="book cover" width="40" height="50" class="table-avatar"
                                                src="{{ asset('storage/' . $book->cover_image) }}"> --}}
                <img width="400" height="200" src="{{ asset('storage/' . $slider->image) }}" class="product-image1" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$slider->title}}</h3>
              <p>{{$slider->sub_title}}</p>

            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </x-admin.section>
</x-base-layout>
