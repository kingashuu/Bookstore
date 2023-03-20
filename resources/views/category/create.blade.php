<x-base-layout>

    <x-slot name="header">
        {{ __('Add New Category') }}

    </x-slot>
    <x-admin.section>
        <div class="row mx-auto">
            <div class="col-md-6">
                <div class="card ">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.category.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <x-forms.input name="name" />
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-default ">Cancel</button>
                                <button type="submit" class="btn btn-info float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </x-admin.section>
    {{-- </section> --}}
</x-base-layout>
