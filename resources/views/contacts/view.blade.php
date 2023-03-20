<x-base-layout>

    <x-slot name="header">
        {{ __('Read Mail') }}

    </x-slot>

    <x-admin.section>

          <div class="row">
        <div class="col-md-10">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Read Mail</h3>
               <div class="card-tools">
                <a href="#" class="btn btn-tool" title="Reply">
                    <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                </a>
              </div>


            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h4>SubjectOf Message: {{$inbox->subject}}</h4>
                <h5>By: {{$inbox->name}}
                    @if ($inbox->sent_to == 1)
                        <h6>Sent From: {{$inbox->email}}
                    @else
                        <h6>Sent To: {{$inbox->email}}
                    @endif


                    {{-- {{$inbox->created_at->diffForHumans()}} --}}
                  <span class="mailbox-read-time float-right">{{$inbox->created_at}}
                </span></h6>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">


                <h3 >{{$inbox->subject}}</h3>
                <p>
                    {{$inbox->message}}
                </p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <div class="float-right">
                <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>

              </div>
              <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


    </x-admin.section>


</x-base-layout>
