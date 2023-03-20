<x-base-layout>

    <x-slot name="header">
        {{ __('Manage Books') }}

    </x-slot>
   <div>
        @if (session()->has('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text">{{ session('message') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        @endif
    </div>
        @if (session()->has('message'))
        <script>
            Swal.fire(
            'Good job!',
            '{!! session('message')  !!}',
            'success'
            )
        </script>
    @endif
    <x-admin.section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h3 class="card-title">DataTable with default features</h3> --}}

                        <div class="card-tools">
                            <a class="btn btn-info btn-sm" href="{{ route('admin.books.create') }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Add New
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table  table-striped align-items-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Cover</th>
                                    <th>Title</th>
                                    <th>Author Name</th>
                                    <th>ISBN</th>
                                    <th>Publisher</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @for (n) --}}

                                {{-- @endfor --}}

                                   @php
                                      $no = 1
                                   @endphp
                                @foreach ($books as $book)

                                    <tr class="">
                                        <td>{{$no ++}}</td>
                                        <td class="">
                                            <img alt="book cover" width="40" height="50" class="table-avatar"
                                                src="{{ asset('storage/' . $book->cover_image) }}">
                                        </td>
                                        <td class="" style="width: 200px;" >
                                            <a style="color: #fff; -webkit-line-clamp: 3;
overflow : hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-box-orient: vertical;"  href="books/{{$book->slug}}">
                                                {{$book->title}}
                                            </a>

                                            {{-- <br />
                                            <small>
                                        {{  $book->created_at->diffForHumans()}}
                                            </small> --}}
                                        </td>
                                        <td>{{$book->authorName}}</td>
                                        <td> {{$book->ISBN_number}}</td>
                                        <td> {{$book->publisher}}<br/>
                                        <small>{{$book->published_date}}</small></td>
                                        {{-- <small>
                                            {{ \Carbon\Carbon::parse($book->published_date)->diffForHumans() }}
                                        </small></td> --}}

                                        <td class="d-flex justify-content-around align-items-center ">

                                        <a class="btn btn-primary btn-sm "
                                        href="books/{{$book->slug}}">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>

                                            <a class="btn btn-info btn-sm"
                                            href="{{ route('admin.books.edit', ['book'=>$book->id]) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>

                                            <form
                                            action="{{ route('admin.books.delete', ['book'=>$book->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                 <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </x-admin.section>

    <!-- /.content-wrapper -->

</x-base-layout>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
