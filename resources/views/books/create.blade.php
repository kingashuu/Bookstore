<x-base-layout>

    <x-slot name="header">
        {{ __('Add New Book') }}

    </x-slot>
    <x-admin.section>

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">

                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <x-forms.input name="title" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ ucwords($category->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Featured</label>
                                        <select name="eatured" class="form-control">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <x-forms.input name="authorName" />
                                </div>
                                <div class="col-sm-6">
                                    <x-forms.input name="ISBN_number" />
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <x-forms.date name="published_date" />
                                </div>
                                <div class="col-sm-6">
                                    <x-forms.input name="page_number" type="number" />
                                </div>
                                <div class="col-sm-6">
                                    <x-forms.input name="publisher" />
                                </div>
                                <div class="col-sm-6">
                                    <x-forms.input name="language" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <x-forms.file-input name="cover_image" />
                                </div>
                                <div class="col-sm-2">
                                    {{-- <x-forms.file-input name="cover_image"/> --}}
                                </div>
                                <div class="col-sm-5">
                                    <x-forms.file-input name="book_file" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <x-forms.textarea name="Short_description" id=""/>
                                </div>
                                <div class="col-sm-12">
                                    <x-forms.textarea name="description" id="summernote"/>
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
{{-- <script src="{{ asset('/assets/plugins/daterangepicker/daterangepicker.js')}}"></script> --}}
