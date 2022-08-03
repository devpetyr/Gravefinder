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
            <div class="FormMain form_2">
              <form action="{{ route('result3') }}" method="GET" class="row g-3">
                <div class="col-md-12">
                  <label for="inputPassword4" class="form-label"
                    >Burial Date:</label
                  >
                  <input type="date" placeholder="m-d-yyyy" class="form-control" name="burial_date" id="inputPassword4" />
                </div>

                <div class="col-12">
                  <div class="backbtn">
                    <a href="{{route('search')}}">Back to Search Criteria </a>
                    <button type="submit" class="btn btn-primary">
                      Search
                    </button>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </form>
              @if($data != '')
              <table>
               <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Burial Date</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                              <?php
                                $no = '1';
                              ?>
                           
                               @foreach($data as $key => $p)
                                <td id="id"><a href="{{route('details',$p->PersonID)}}">{{$key+1}}</a></td>
                                <td id="first_name"><a href="{{route('details',$p->PersonID)}}">{{$p->FirstName}}</a></td>
                                <td id="lastname"><a href="{{route('details',$p->PersonID)}}">{{$p->LastName}}</a></td>
                                <td id="burial_dte"><a href="{{route('details',$p->PersonID)}}">{{$p->Burial}}</a></td> 
                                </tr>
                        </tbody>

                        @endforeach

                    </table>
                     @else
                     <h4>No record was found against this search!</h4>
                    @endif
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
 