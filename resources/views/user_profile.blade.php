@extends('layouts.main')
@section('content') 
    <!-- main -->
    <main>
      <section class="mainSec">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-12 centerCol">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="fasq-main me_hed">
                    <div class="Whitemain white_2">
                        <div class="ownname text-center">
                            <span>My Profile</span>
                        </div>

                      <form action="{{route('user_profile_change')}}" method="POST" enctype="multipart/form-data">@csrf
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <div class="mb-4">
                                        <label for="name">UserName</label>
                                        <input type="text" class="form-control" name="name" readonly="" disabled="" value="{{$user->name}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email">Email Address</label>
                                        <input disabled="" readonly="" type="text" class="form-control"  name="email" value="{{$user->email}}">
                                    </div>
                                     <div class="mb-4">
                                        <label for="old_password">Confirm  Old Password</label>
                                        <input  type="password" class="form-control" required name="old_password">
                                    </div>
                                      <div class="mb-4">
                                        <label for="new_password">New Password</label>
                                        <input type="password" class="form-control" required name="new_password">
                                    </div>
                                     <div class="mb-4">
                                        <label for="title">Confirm Password</label>
                                        <input type="password" class="form-control" required name="confirm_password">
                                    </div>
                                    <div class="my-4">
                                        <button class="btn btn-pill btn-outline-success" type="submit">Submit</button>
                                    </div>

                                </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- end main -->
 @endsection
  @section('css')

 @endsection

 @section('js')
  <script>
  @if(Session::has('message'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
      toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
      toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
      toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
      toastr.warning("{{ session('warning') }}");
  @endif
</script>
 @endsection  