<x-base-layout>

    <x-slot name="header">
        {{ __('Add New Slider') }}

    </x-slot>
    <x-admin.section>
        <div class="row mx-auto">
            <div class="col-md-10">
                <div class="card ">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <x-forms.input name="title" />
                                </div>
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <x-forms.input name="sub_title" />
                                </div>
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <x-forms.input name="url_link" />
                                </div>
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <x-forms.file-input name="image" />
                                </div>

                                <div class="col-sm-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>status</label>
                                        <select name="status" class="form-control">
                                            <option value="0">In Active</option>
                                            <option value="1">Active</option>

                                        </select>
                                    </div>
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
