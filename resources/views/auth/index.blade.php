<x-base-layout>

    <x-slot name="header">
        {{ __('Manage users') }}

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

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table  table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User Image</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @for (n) --}}

                                {{-- @endfor --}}

                                   @php
                                      $no = 1
                                   @endphp
                                @foreach ($users as $user)

                                    <tr>
                                        <td>{{$no ++}}</td>
                                        <td>
                                            @if(Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                <img class="rounded-circle" width="50" height="50" src="{{ $user->profile_photo_url }}"
                                                    alt="{{ $user->name }}" />
                                            @else
                                                {{ $user->name }}

                                                <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @endif

                                        </td>
                                        <td><a>
                                                {{$user->name}}
                                            </a>
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if ($user->is_admin == 1)
                                                <span class="badge bg-success">Admin</span>
                                            @else
                                                <span class="badge bg-warning text-dark">User</span>
                                            @endif
                                        </td>
                                            {{-- {{$user->status}}</td> --}}
                                        {{-- <td class="d-flex justify-content-around">
                                            <a
                                            class="btn btn-primary btn-sm"
                                            href="user/{{$user->id}}">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm"
                                            href="{{ route('admin.user.edit', ['user'=>$user->id]) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <form
                                            action="{{ route('admin.user.delete', ['user'=>$user->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                 <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </button>
                                            </form>

                                        </td> --}}
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
