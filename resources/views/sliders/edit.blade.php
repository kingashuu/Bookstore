<x-base-layout>

    <x-slot name="header">
        {{ __('Edite Category') }}

    </x-slot>
    <x-admin.section>
        <div class="row mx-auto">
            <div class="col-md-10">
                <div class="card ">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.slider.update', ['slider' => $slider->id]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <x-forms.input name="title" :value="old('title', $slider->title)"/>
                                </div>
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <x-forms.input name="sub_title" :value="old('sub_title', $slider->sub_title)"/>
                                </div>
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <x-forms.input name="url_link" :value="old('url_link', $slider->url_link)"/>
                                </div>
                               <div class="col-sm-8">
                                    <!-- text input -->
                                    <x-forms.file-input name="image" />
                                </div>
                                <div class="col-sm-4">
                                    <img src="{{ asset('storage/' . $slider->image) }}" alt="image" width="100" height="120">
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
