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
                  <div class="fasq-main">
                    <div class="Whitemain white_2">
                      <div class="ownname text-center">
                        <span>FAQs</span>
                      </div>
                      <div class="imagename">
                        <p>
                          For your convenience, our most common customer
                          questions are answered right here.
                        </p>
                        <p>
                          Not finding what you want? Reach out directly through
                          our
                          <a href="{{route('contact_us')}}"> Contact Us</a> page.
                        </p>
                        @foreach(Helper::faq_result() as $key => $faq)
                    @if($faq != '')
                        <p><strong> Q:</strong> {{$faq->title}}</p>
                        <p><strong> A:</strong> {{$faq->description}}</p>
                        @endif
                        @endforeach
                      </div>
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

 @endsection  