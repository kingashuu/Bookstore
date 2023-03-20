<x-base-layout>

    <x-slot name="header">
        {{ __('New Message') }}

    </x-slot>

    <x-admin.section>
        <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">

        <div class="row">
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Compose New Message</h3>
              </div>
              <!-- /.card-header -->
              <form action="{{ route('admin.post_compose') }}" method="post">
                @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <input name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="To:">
                    </div>
                    <div class="form-group">
                      <input class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" placeholder="Subject:">
                    </div>

                    {{-- <x-forms.input name="subject" /> --}}
                    <x-forms.textarea name="message" id="summernote" />


                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <div class="float-right">

                      <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                    </div>

                  </div>

              </form>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

    </x-admin.section>
</x-base-layout>
