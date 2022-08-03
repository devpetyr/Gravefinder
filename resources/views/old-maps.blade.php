@extends('layouts.main')
@section('content') 
    <!-- main -->
    <main>
      <section class="mainSec">
        <div class="container">
          <div class="Whitemain">
            <div class="ownname text-center">
              <span>Maps of St Stanislaus Old Side Overview</span>
            </div>
            @foreach($oldside as  $key => $side)
            <div class="row">
              <div class="col-md-8 col-sm-8 col-xs-12 centerCol">
          
                                          <div class="col-md-10 col-sm-12 col-xs-12">
                                            <div class="new-imagename">
                                              <div class="hover_img">
                                                <img src="{{asset('assets/graveyard_images/old-side/'.$side->image)}}" alt="Avatar" class="image">
                                               
                                              </div>
                                              </div>
                                            </div>
                </div>
                </div>
                @endforeach
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