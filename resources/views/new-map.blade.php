@extends('layouts.main')
@section('content') 
  <!-- main -->
    <main>
      <section class="mainSec">
        <div class="container">
          <div class="Whitemain">
              <div class="ownname text-center">
              <span>Maps of St Stanislaus New Side</span>
            </div>
           <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12 centerCol">
              <div class="row">
                 @foreach($newside as  $key => $side)
             <div class="col-md-10 col-sm-12 col-xs-12">
                    <div class="new-imagename">
                        <img src="{{asset('assets/graveyard_images/new-side/'.$side->image)}}" class="img-fluid"alt="web-page-3"/>
                      </div>
                </div>
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