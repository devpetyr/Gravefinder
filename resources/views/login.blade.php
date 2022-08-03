@extends('layouts.main')
@section('content') 
    <!-- main -->
    <main>
      <section class="mainSec">
        <div class="container">
          <div class="Whitemain">
            <div class="ownname">
              <br />
              <span>Login </span>
            </div>
            <div class="FormMain">
              <form action="{{route('login_data_page')}}" method="POST" class="mt-4">@csrf
                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="email">Your Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><span class="fas fa-envelope"></span></span>
                                        <input type="email" class="form-control" placeholder="example@company.com" id="email" autofocus required name="email">
                                    </div>
                                </div>
                                <!-- End of Form -->
                                <div class="form-group">
                                    <!-- Form -->
                                    <div class="form-group mb-4">
                                        <label for="password">Your Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2"><span class="fas fa-unlock-alt"></span></span>
                                            <input type="password" placeholder="Password" class="form-control" id="password" required name="password">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        {{-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                                            <label class="form-check-label" for="defaultCheck5">
                                              Remember me
                                            </label>
                                        </div> --}}
                                        <div><a href="#" class="small text-right">Lost password?</a></div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Sign in</button>
                            </form>
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

 @endsection  