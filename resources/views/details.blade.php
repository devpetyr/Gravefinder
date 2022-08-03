@extends('layouts.main')
@section('content')
    <!-- main -->
    <main>
        <section class="mainSec">
            <div class="container">
                <div class="Whitemain detail-table">
                    <div class="ownname text-center">
                        <span>Gravesite Details</span>
                    </div>
                    <div class="ownname text-center">
                        <span>Personal Information</span>
                    </div>
                    <div class="table-responsive">
                    <table>
                        @foreach($data as $p)
                            <thead>
                            <tr>
                                <th colspan="2">Call office for orginal line and lot numbers 716-892-9135</th>
                            </tr>
                            </thead>

                            <tbody id="tbody">
                            <tr>
                                <?php
                                $no = '1';
                                ?>

                                <td><b>Name:</b></td>
                                <td>{{$p->FirstName}} {{$p->LastName}}</td>
                            </tr>
                            <tr>
                                <td><b>Approximate Birth Year:</b></td>
                                <td>{{$p->ApproxBirthYear }}</td>
                            </tr>
                            <tr>
                                <td><b>Approximate Death Year:</b></td>
                                <td>{{$p->DeathYear}}</td>
                            </tr>
                            <tr>
                                <td><b>Burial:</b></td>
                                <td>{{$p->Burial}}</td>
                            </tr>
                            <tr>
                                <td><b>Section:</b></td>
                                <td>{{$p->Section}}</td>
                            </tr>
                            <tr>
                                <td><b>Side:</b></td>
                                <td>{{$p->Side}}</td>
                            </tr>
                            <tr>
                                <td><b>Grave:</b></td>
                                <td>{{$p->Grave}}</td>
                            </tr>
                            <tr>
                                <td><b>Ledger Page:</b></td>
                                <td>{{$p->LedgerPage  }}</td>
                            </tr>

                            <tr>
                                <td><b>Stone Type:</b></td>
                                <td>{{$p->StoneOneType }}</td>
                            </tr>
                            <tr>
                                <td><b>Stone Number:</b></td>
                                <td>{{$p->StoneOneNum }}</td>
                            </tr>
                            <tr>
                                <td><b>Total Number of Stones in Line:</b></td>
                                <td>{{$p->TotalNumStonesInLine}}</td>
                            </tr>
                            <tr>
                                <td><b>First Visible Surname in Line:</b></td>
                                <td>{{$p->FirstNameInLine }}</td>
                            </tr>
                            <tr>
                                <td><b>Burial Picture Reference:</b></td>
                                <td>{{$p->PersonID}}</td>
                            </tr>
                            <tr>
                                <td colspan="2">Questions? E-mail me! brbruppert@gmail.com</td>
                            </tr>
                            
                               
                            @if($p->PicID1 != '')
                            @if (file_exists( public_path() . '/assets/graveyard_images/images/' . $p->PicID1 . '.jpg')) 
                              <tr class="detail_bgbox">
                                    <td>

                                            <img src="{{asset('assets/graveyard_images/images/'.$p->PicID1.'.jpg')}}">
                                            <ul>
                                                <p>{{$p->FirstName}} {{$p->LastName}} photo 1 </p>
                                                <p>Price: ${{Helper::stone_rate()->rate}}</p>
                                                <li><a class="add_cart" href="javascript:void(0)" data-pic="PicID1"
                                                       data-id="{{$p->PersonID}}">Add to cart</a></li>
                                            </ul>

                                    </td>
                                </tr>
                                @else
                                 <tr class="detail_bgbox">
                                    <td>
                               <img width="200" height="200" src="{{asset('images/default.jpg')}}">
                                 <ul>
                {{-- {{ route('add.to.cart', $live_course->id) }} --}}
                
                <li><a class="add_cart" href="javascript:void(0)" data-pic = "PicID1" data-id = "{{$p->PersonID}}" >Add to cart</a></li> 
              <p>{{$p->FirstName}} {{$p->LastName}} photo 1 </p>
              <p>Price: ${{Helper::stone_rate()->rate}}</p>
              </ul>
              </td>
                                </tr>
                              
                                @endif
                                @endif
                            @if($p->PicID2 != '')
                            @if (file_exists( public_path() . '/assets/graveyard_images/images/' . $p->PicID2 . '.jpg')) 
                             <tr class="detail_bgbox">
                                <td>

                                        <img src="{{asset('assets/graveyard_images/images/'.$p->PicID2.'.jpg')}}">
                                        <ul>
                                            <p>{{$p->FirstName}} {{$p->LastName}} photo 2 </p>
                                            <p>Price: ${{Helper::stone_rate()->rate}}</p>
                                            <li><a class="add_cart" href="javascript:void(0)" data-pic="PicID2"
                                                   data-id="{{$p->PersonID}}">Add to cart</a></li>
                                        </ul>

                                </td>
                            </tr>
                                @else
                                <tr class="detail_bgbox">
                                    <td>
                               <img width="200" height="200" src="{{asset('images/default.jpg')}}">
                                 <ul>
                {{-- {{ route('add.to.cart', $live_course->id) }} --}}
                
                <li><a class="add_cart" href="javascript:void(0)" data-pic = "PicID2" data-id = "{{$p->PersonID}}" >Add to cart</a></li> 
              <p>{{$p->FirstName}} {{$p->LastName}} photo 2 </p>
              <p>Price: ${{Helper::stone_rate()->rate}}</p>
              </ul>
              </td>
                                </tr>
                            
                            @endif
                            @endif
                            @if($p->PicID3 != '')
                            @if (file_exists( public_path() . '/assets/graveyard_images/images/' . $p->PicID3 . '.jpg')) 
                              <tr class="detail_bgbox">
                                <td>

                                        <img src="{{asset('assets/graveyard_images/images/'.$p->PicID3.'.jpg')}}">
                                        <ul>


                                            <p>{{$p->FirstName}} {{$p->LastName}} photo 3 </p>
                                            <p>Price: ${{Helper::stone_rate()->rate}}</p>
                                            <li><a class="add_cart" href="javascript:void(0)" data-pic="PicID3"
                                                   data-id="{{$p->PersonID}}">Add to cart</a></li>
                                        </ul>

                                </td>
                            </tr>
                                @else
                                <tr class="detail_bgbox">
                                    <td>
                               <img width="200" height="200"  src="{{asset('images/default.jpg')}}">
                                 <ul>
                {{-- {{ route('add.to.cart', $live_course->id) }} --}}
                
                <li><a class="add_cart" href="javascript:void(0)" data-pic = "PicID3" data-id = "{{$p->PersonID}}" >Add to cart</a></li> 
              <p>{{$p->FirstName}} {{$p->LastName}} photo 3 </p>
              <p>Price: ${{Helper::stone_rate()->rate}}</p>
              </ul>
              </td>
                                </tr>
                           
                            @endif
                            @endif
                            @if($p->PicID4 != '')
                            @if (file_exists( public_path() . '/assets/graveyard_images/images/' . $p->PicID4 . '.jpg')) 
                             <tr class="detail_bgbox">
                                <td>

                                        <img src="{{asset('assets/graveyard_images/images/'.$p->PicID2.'.jpg')}}">
                                        <ul>


                                            <p>{{$p->FirstName}} {{$p->LastName}} photo 4 </p>
                                            <p>Price: ${{Helper::stone_rate()->rate}}</p>
                                            <li><a class="add_cart" href="javascript:void(0)" data-pic="PicID4"
                                                   data-id="{{$p->PersonID}}">Add to cart</a></li>
                                        </ul>

                                </td>
                            </tr>
                                @else
                                 <tr class="detail_bgbox">
                                    <td>
                               <img width="200" height="200"  src="{{asset('images/default.jpg')}}">
                                 <ul>
                {{-- {{ route('add.to.cart', $live_course->id) }} --}}
                
                <li><a class="add_cart" href="javascript:void(0)" data-pic = "PicID4" data-id = "{{$p->PersonID}}" >Add to cart</a></li> 
              <p>{{$p->FirstName}} {{$p->LastName}} photo 4 </p>
              <p>Price: ${{Helper::stone_rate()->rate}}</p>
              </ul>
              </td>
                                </tr>
                           
                            @endif
                            @endif
                        @endforeach
                        @if($p->PicID2 == '' &&  $p->PicID1 == '' &&  $p->PicID3 == '' &&  $p->PicID4 == '')
                            <h3>Because there is NO GRAVESTONE there is NO PHOTOGRAPH.</h3>
                        @endif
                            </tbody>
                    </table>
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
        $(document).ready(function () {
            $('.add_cart').on('click', function () {
                let id = $(this).attr("data-id");
                let pic = $(this).attr("data-pic");
                if (id != null) {
                    $.ajax({
                        url: "{{ route('add.to.cart') }}",
                        method: "GET",
                        dataType: "JSON",
                        data: {id: id, pic: pic},
                        success: function (data) {
                            toastr.success(data.message);
                            $('#cart_count').html(data.cart_count);

                        }
                    })
                }
            });

        });
    </script>
@endsection