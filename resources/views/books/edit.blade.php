<script src="{{ asset('/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<x-base-layout>

    <x-slot name="header">
        {{ __('Edit Book') }}

    </x-slot>
    <x-admin.section>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.books.update', ['book' => $book->id]) }}"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <x-forms.input name="title" :value="old('title', $book->title)" />
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ ucwords($category->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Featured</label>
                                        <select name="featured" class="form-control">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <x-forms.input name="authorName" :value="old('authorName', $book->authorName)" />
                                </div>
                                <div class="col-sm-6">
                                    <x-forms.input name="ISBN_number" :value="old('ISBN_number', $book->ISBN_number)" />
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <x-forms.date name="published_date" :value="old('published_date', $book->published_date)" />
                                </div>
                                <div class="col-sm-6">
                                    <x-forms.input name="page_number" type="number" :value="old('page_number', $book->page_number)" />
                                </div>
                                <div class="col-sm-6">
                                    <x-forms.input name="publisher" :value="old('publisher', $book->publisher)" />
                                </div>
                                <div class="col-sm-6">
                                    <x-forms.input name="language" :value="old('language', $book->language)" />
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
                                    <x-forms.textarea name="Short_description" id="">
                                        {{ old('Short_description', $book->Short_description) }}
                                    </x-forms.textarea>
                                    <div class="col-sm-12">
                                        <x-forms.textarea name="description" id="summernote">
                                            {{ old('description', $book->description) }}
                                        </x-forms.textarea>
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
{{-- <script src="{{ asset('/assets/plugins/daterangepicker/daterangepicker.js')}}"></script> --}}
