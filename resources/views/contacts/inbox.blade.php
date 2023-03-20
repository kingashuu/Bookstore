<x-base-layout>

    <x-slot name="header">
        {{ __('Inboxs') }}

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
                '{!! session('message') !!}',
                'success'
            )
        </script>
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
    @endif
    <x-admin.section>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">

                        <a href="{{ route('admin.compose') }}">

                            <button type="button" class="btn btn-primary btn-md">
                                Compose New Message</i>
                            </button>
                        </a>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Search Mail">
                                <div class="input-group-append">
                                    <div class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">

                        <div class="table-responsive mailbox-messages">
                            <table id="example1" class="table table-hover  table-striped align-items-center">
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($message as $inbox)
                                        <a href="">

                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        {{ $no++ }}
                                                    </div>
                                                </td>
                                                <td class="mailbox-star">

                                                    @if ($inbox->opened == 0)
                                                        <i class="fas fa-envelope text-warning"></i>
                                                    @else
                                                        <i class="fas fa-envelope "></i>
                                                    @endif

                                                </td>
                                                <td class="mailbox-name">
                                                    <p class="text-capitalize fs-1 mb-0">{{ $inbox->name }}</p>
                                                    {{-- <p class="">{{ $inbox->email }}</p> --}}
                                                </td>
                                                <td class="mailbox-subject d-inline-block text-truncate"
                                                    style="max-width: 550px;">
                                                    <b>{{ $inbox->subject }}</b> - {{ $inbox->message }}
                                                </td>
                                                <td class="mailbox-date">{{ $inbox->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="inbox/{{ $inbox->id }}">

                                                            <button type="button" class="btn btn-default btn-sm">
                                                                <i class="far fa-file-alt"></i>
                                                            </button>
                                                        </a>

                                                        <form
                                                            action="{{ route('admin.inbox.delete', ['id' => $inbox->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="far fa-trash-alt"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                        </a>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>


    </x-admin.section>

    <!-- /.content-wrapper -->

</x-base-layout>
