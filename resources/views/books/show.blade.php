<x-base-layout>

    <x-slot name="header">
        {{ __('View Books') }}

    </x-slot>

    <x-admin.section>
       <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{$book->title}}</h3>
              <div class="col-md6 text-center">
                {{-- <img alt="book cover" width="40" height="50" class="table-avatar"
                                                src="{{ asset('storage/' . $book->cover_image) }}"> --}}
                <img width="300" height="400" src="{{ asset('storage/' . $book->cover_image) }}" class="product-image1" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$book->title}}</h3>
              <p>{{$book->Short_description}}</p>

              <hr>
<div class="list-group">
  <div href="#" class="list-group-item list-group-item-action active" aria-current="true">
    <div class="d-flex justify-content-evenly mr-5">
        <span class="mr-2">Author : </span>
        <span>{{$book->authorName}}</span>
    </div>
  </div>
  <div  class="list-group-item list-group-item-action active" aria-current="true">
    <div class="d-flex justify-content-evenly mr-5">
        <span class="mr-2">Published by : </span>
        <span>{{$book->publisher}}</span>

    </div>
    <small>{{$book->published_date}}</small>
  </div>
  <div  class="list-group-item list-group-item-action active" aria-current="true">
    <div class="d-flex justify-content-evenly mr-5">
        <span class="mr-2"> pages : </span>
        <span>{{$book->page_number}}</span>
    </div>
  </div>
  <div  class="list-group-item list-group-item-action active" aria-current="true">
    <div class="d-flex justify-content-evenly mr-5">
        <span class="mr-2"> ISBN 10: </span>
        <span>{{$book->ISBN_number}}</span>
    </div>
  </div>
</div>


<hr>

              <div class="mt-4">
              <div class="btn btn-default  btn-flat">
                  <h2 class="mb-0">
                  {{ $book->category->name }}
                  </h2>
                </div>
              </div>

              <div class="mt-4">
                <a href="{{ route('admin.books.download', ['id'=>$book->id]) }}" class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-download fa-lg mr-2"></i>
                  Download
                </a>
              </div>
              {{-- <div class="d-flex justify-content-evenly">...</div> --}}



            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{$book->description}}</div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </x-admin.section>
</x-base-layout>
