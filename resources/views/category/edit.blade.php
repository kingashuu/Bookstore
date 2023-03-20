<x-base-layout>

    <x-slot name="header">
        {{ __('Edite Category') }}

    </x-slot>
    <x-admin.section>
        <div class="row mx-auto">
            <div class="col-md-6">
                <div class="card ">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.category.update', ['category' => $category->id]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <x-forms.input name="name" :value="old('name', $category->name)"/>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-default ">Cancel</button>
                                <button type="submit" class="btn btn-info float-right">Update</button>
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
