@extends('admin.layouts.main')
@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="{{route('admin_products')}}">Blog-List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product-Edit</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Blog Edit</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-5 mb-4 ml-4">
                <div class="card border-light shadow-sm components-section">
                    <div class="card-body">
                        <div class="row mb-4">

                            <div class="col-lg-12 col-sm-12">
                                <!-- Form -->
                                @if(Session::has('update'))
                                    <div class="alert alert-warning mb-4" id="success-alert">
                                        <center><span class="text-white">{{Session::get('update')}}</span></center>
                                    </div>
                                @endif
                                 <form action="{{route('admin_products_add_edit')}}" method="POST" enctype="multipart/form-data">@csrf
                                    <input type="hidden" name="person_id" value="{{$product->PersonID}}">
                                      <div class="mb-4">
                                        <label for="firstname">FirstName</label>
                                        <input type="text" class="form-control"  name="firstname" value="{{$product->FirstName}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control"  name="lastname" value="{{$product->LastName}}">
                                    </div>
                                     <div class="mb-4">
                                        <label for="burial">Burial</label>
                                        <input type="text" class="form-control"  name="burial" value="{{$product->Burial}}">
                                    </div>
                                      <div class="mb-4">
                                        <label for="middleinitial">MiddleNameInitial</label>
                                        <input type="text" class="form-control"  name="middleinitial" value="{{$product->MiddleNameInitial}}">
                                    </div>
                                      <div class="mb-4">
                                        <label for="prefix">Prefix</label>
                                        <input type="text" class="form-control"  name="prefix"  value="{{$product->Prefix}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="suffixortwin">Suffix Or Twin </label>
                                        <input type="text" class="form-control"  name="suffixortwin"  value="{{$product->SuffixOrTwin}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="alt1">Alt Last Name Spelling 1</label>
                                        <input type="text" class="form-control"  name="alt1" value="{{$product->AltLastNameSpelling1}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="alt2">Alt Last Name Spelling 2</label>
                                        <input type="text" class="form-control"  name="alt2"  value="{{$product->AltLastNameSpelling2}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="alt3">Alt Last Name Spelling 3</label>
                                        <input type="text" class="form-control"  name="alt3"  value="{{$product->AltLastNameSpelling3}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="altgiven">AltGivenMiddleMaidenName</label>
                                        <input type="text" class="form-control"  name="altgiven" value="{{$product->AltGivenMiddleMaidenName}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="military">Military</label>
                                        <input type="text" class="form-control"  name="military" value="{{$product->Military}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="comments">Comments</label>
                                        <input type="text" class="form-control"  name="comments"  value="{{$product->Comments}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="approxbirthdate">ApproxBirthDate</label>
                                        <input type="text" class="form-control"  name="approxbirthdate" value="{{$product->ApproxBirthDate}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="approxbirthyear">ApproxBirthYear</label>
                                        <input type="text" class="form-control"  name="approxbirthyear" value="{{$product->ApproxBirthYear}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="approxdeathyear">ApproxDeathYear</label>
                                        <input type="text" class="form-control"  name="approxdeathyear"  value="{{$product->DeathYear}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="approxdeathdate">ApproxDeathDate</label>
                                        <input type="text" class="form-control"  name="approxdeathdate"  value="{{$product->ApproxDeathDate}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="section">Section</label>
                                        <input type="text" class="form-control"  name="section"  value="{{$product->Section}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="stoneoneline">StoneOneLine</label>
                                        <input type="text" class="form-control"  name="stoneoneline" value="{{$product->StoneOneLine}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="stoneonetype">StoneOneType</label>
                                        <input type="text" class="form-control"  name="stoneonetype" value="{{$product->StoneOneType}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="stoneonenum">StoneOneNum</label>
                                        <input type="text" class="form-control"  name="stoneonenum" value="{{$product->StoneOneNum}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="stonetwoline">StoneTwoLine</label>
                                        <input type="text" class="form-control"  name="stonetwoline" value="{{$product->StoneTwoLine}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="stonetwonum">StoneTwoNum</label>
                                        <input type="text" class="form-control"  name="stonetwonum" value="{{$product->StoneTwoNum}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="stonetwotype">StoneTwoType</label>
                                        <input type="text" class="form-control"  name="stonetwotype" value="{{$product->StoneTwoType}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="paces">Paces Between Stones In Seven Sections Only</label>
                                        <input type="text" class="form-control"  name="paces"  value="{{$product->PacesBetweenStonesInSevenSectionsOnly}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="semicircle">Semi Circle Locations Outer Inner First Inner Second Inner</label>
                                        <input type="text" class="form-control"  name="semicircle"  value="{{$product->SemiCircleLocationOuterInnerFirstInnerSecondInner}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="direction">Direction Semi Circle Stones Face</label>
                                        <input type="text" class="form-control"  name="direction" value="{{$product->DirectionSemiCircleStonesFace}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="totalnum">Total Num Stones In Line</label>
                                        <input type="text" class="form-control"  name="totalnum" value="{{$product->TotalNumStonesInLine}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="fninline">First Name In Line</label>
                                        <input type="text" class="form-control"  name="fninline" value="{{$product->FirstNameInLine}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="side">Side</label>
                                        <input type="text" class="form-control"  name="side"  value="{{$product->Side}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="grave">Grave</label>
                                        <input type="text" class="form-control"  name="grave" value="{{$product->grave}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="ledgerpage">LedgerPage</label>
                                        <input type="text" class="form-control"  name="ledgerpage" value="{{$product->LedgerPage}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="map1">Map1</label>
                                        <input type="text" class="form-control"  name="map1"  value="{{$product->Map11}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="map2">Map2</label>
                                        <input type="text" class="form-control"  name="map2"  value="{{$product->Map2}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="map3">Map3</label>
                                        <input type="text" class="form-control"  name="map3"  value="{{$product->Map3}}">
                                    </div>
                                    <div>
                                        <label for="textarea">Pic 1</label>
                                        <div class="form-file mb-3">
                                            <input type="file" class="form-file-input" id="customFile" name="pic1" onchange="loadFile($(this))">
                                            <label class="form-file-label" for="customFile">
                                                <span class="form-file-text">Choose file...</span>
                                                <span class="form-file-button">Browse</span>
                                            </label>
                                            @if($product->PicID1 != '')
                                            <img src="{{asset('assets/graveyard_images/images/'.$product->PicID1.'.jpg')}}" class="img-fluid image-preview" alt="" id="output">
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <label for="textarea">Pic 2</label>
                                        <div class="form-file mb-3">
                                            <input type="file" class="form-file-input" id="customFile" name="pic2" onchange="loadFile($(this))">
                                            <label class="form-file-label" for="customFile">
                                                <span class="form-file-text">Choose file...</span>
                                                <span class="form-file-button">Browse</span>
                                            </label>
                                            @if($product->PicID2 != '')
                                            <img src="{{asset('assets/graveyard_images/images/'.$product->PicID2.'.jpg')}}" class="img-fluid image-preview" alt="" id="output">
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <label for="textarea">Pic 3</label>
                                        <div class="form-file mb-3">
                                            <input type="file" class="form-file-input" id="customFile" name="pic3" onchange="loadFile($(this))">
                                            <label class="form-file-label" for="customFile">
                                                <span class="form-file-text">Choose file...</span>
                                                <span class="form-file-button">Browse</span>
                                            </label>
                                            @if($product->PicID3 != '')
                                            <img src="{{asset('assets/graveyard_images/images/'.$product->PicID3.'.jpg')}}" class="img-fluid image-preview" alt="" id="output">
                                            @endif
                                        </div>
                                    </div>
                                      <div>
                                        <label for="textarea">Pic 4</label>
                                        <div class="form-file mb-3">
                                            <input type="file" class="form-file-input" id="customFile" name="pic4" onchange="loadFile($(this))">
                                            <label class="form-file-label" for="customFile">
                                                <span class="form-file-text">Choose file...</span>
                                                <span class="form-file-button">Browse</span>
                                            </label>
                                            @if($product->PicID4 != '')
                                            <img src="{{asset('assets/graveyard_images/images/'.$product->PicID4.'.jpg')}}" class="img-fluid image-preview" alt="" id="output">
                                            @endif
                                        </div>
                                    </div>
                                    <fieldset class="my-4">
                                        <legend class="h6">Status</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" {{ $product->status === 1 ? 'checked' : ''}}>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0" {{ $product->status === 0 ? 'checked' : ''}}>
                                            <label class="form-check-label" for="exampleRadios2">
                                                Inactive
                                            </label>
                                        </div>
                                    </fieldset>
                                    <div class="my-4">
                                        <button class="btn btn-pill btn-outline-success" type="submit">Submit</button>
                                    </div>
                                </form>
                                <!-- End of Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
