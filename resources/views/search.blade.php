@extends('layouts.main')
@section('content') 
    <!-- main -->
    <main>
      <section class="mainSec">
        <div class="container">
          <div class="Whitemain">
            <div class="ownname text-center">
              <span>Search Gravesite Details</span>
            </div>
            <div class="searchtext">
              <small>Select Search Criteria Below:</small>
            </div>
            <div class="Searchbox">
              <ul>
                <li><a href="{{route('result')}}">Last Name & Burial Date</a></li>
                <li><a href="{{route('result2')}}">Last Name</a></li>
                <li><a href="{{route('result3')}}">Burial Date</a></li>
              </ul>
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