@extends('layouts.main')
@section('content') 
    <!-- main -->
    <main>
      <section class="mainSec">
        <div class="container">
          <div class="Whitemain">
            <div class="ownname">
              <br />
              <span>Sign Up</span>
            </div>
            <div class="FormMain form_height">
              <form class="row g-3">
                <div class="col-md-12">
                  <label for="inputPassword4" class="form-label"
                    >First Name</label
                  >
                  <input type="text" class="form-control" id="inputPassword4" />
                </div>
                <div class="col-md-12">
                  <label for="inputPassword4" class="form-label"
                    >Last Name</label
                  >
                  <input type="text" class="form-control" id="inputPassword4" />
                </div>
                <div class="col-md-12">
                  <label for="inputPassword4" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="inputPassword4"
                  />
                </div>
                <div class="col-md-12">
                  <label for="inputPassword4" class="form-label"
                    >Password</label
                  >
                  <input
                    type="password"
                    class="form-control"
                    id="inputPassword4"
                  />
                </div>

                <div class="col-12">
                  <div class="backbtn">
                    <a href="{{route('search')}}">Submit </a>
                    <div class="clearfix"></div>
                  </div>
                </div>
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