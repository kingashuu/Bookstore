<x-base-layout>

    <x-slot name="header">
        {{ __('Manage Sliders') }}

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
                            <a class="btn btn-info btn-sm" href="{{ route('admin.slider.create') }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Add New
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table  table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Slider Image</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>status</th>
                                    <th>link</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @for (n) --}}

                                {{-- @endfor --}}

                                   @php
                                      $no = 1
                                   @endphp
                                @foreach ($sliders as $slider)

                                    <tr>
                                        <td>{{$no ++}}</td>
                                        <td>
                                            <img alt="book cover" width="100" height="50" class="table-avatar"
                                                src="{{ asset('storage/' . $slider->image) }}">
                                        </td>
                                        <td><a>
                                                {{$slider->title}}
                                            </a>
                                        </td>
                                        <td>{{$slider->sub_title}}</td>
                                        <td>
                                            @if ($slider->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-warning text-dark">In Active</span>
                                            @endif
                                        </td>
                                            {{-- {{$slider->status}}</td> --}}
                                       <td>{{$slider->url_link}}</td>
                                        <td class="d-flex justify-content-around">
                                            <a
                                            class="btn btn-primary btn-sm"
                                            href="slider/{{$slider->id}}">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm"
                                            href="{{ route('admin.slider.edit', ['slider'=>$slider->id]) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <form
                                            action="{{ route('admin.slider.delete', ['slider'=>$slider->id]) }}" method="POST">
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
