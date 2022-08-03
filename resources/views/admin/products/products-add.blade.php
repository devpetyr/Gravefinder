@extends('admin.layouts.main')
@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="{{route('admin_products')}}">Products-List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product-Add</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Product Add</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-5 mb-4 ml-4">
                <div class="card border-light shadow-sm components-section">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-lg-12 col-sm-12">
                                <!-- Form -->
                                @if(Session::has('success'))
                                    <div class="alert alert-success mb-4" id="success-alert">
                                        <center><span class="text-white">{{Session::get('success')}}</span></center>
                                    </div>
                                @endif
                                <form action="{{route('admin_products_add_edit')}}" method="POST" enctype="multipart/form-data">@csrf
                                     <input type="hidden" name="person_id" value="">
                                      <div class="mb-4">
                                        <label for="firstname">FirstName</label>
                                        <input type="text" class="form-control" name="firstname" placeholder="Enter First Name">
                                    </div>
                                    <div class="mb-4">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Enter last name">
                                    </div>
                                     <div class="mb-4">
                                        <label for="burial">Burial</label>
                                        <input type="text" class="form-control" name="burial" placeholder="Enter Burial Date">
                                    </div>
                                      <div class="mb-4">
                                        <label for="middleinitial">MiddleNameInitial</label>
                                        <input type="text" class="form-control" name="middleinitial" placeholder="Enter Middle Name Initial.">
                                    </div>
                                      <div class="mb-4">
                                        <label for="prefix">Prefix</label>
                                        <input type="text" class="form-control" name="prefix" placeholder="Enter prefix">
                                    </div>
                                    <div class="mb-4">
                                        <label for="suffixortwin">Suffix Or Twin </label>
                                        <input type="text" class="form-control" name="suffixortwin" placeholder="Suffix or Twin?">
                                    </div>
                                    <div class="mb-4">
                                        <label for="alt1">Alt Last Name Spelling 1</label>
                                        <input type="text" class="form-control" name="alt1" placeholder="Enter Alt Last Name Spelling 1">
                                    </div>
                                    <div class="mb-4">
                                        <label for="alt2">Alt Last Name Spelling 2</label>
                                        <input type="text" class="form-control" name="alt2" placeholder="Enter Alt Last Name Spelling 2">
                                    </div>
                                    <div class="mb-4">
                                        <label for="alt3">Alt Last Name Spelling 3</label>
                                        <input type="text" class="form-control" name="alt3" placeholder="Enter Alt Last Name Spelling 1">
                                    </div>
                                    <div class="mb-4">
                                        <label for="altgiven">AltGivenMiddleMaidenName</label>
                                        <input type="text" class="form-control" name="altgiven" placeholder="Enter your Middle Maiden Name">
                                    </div>
                                    <div class="mb-4">
                                        <label for="military">Military</label>
                                        <input type="text" class="form-control" name="military" placeholder="Military or not?">
                                    </div>
                                    <div class="mb-4">
                                        <label for="comments">Comments</label>
                                        <input type="text" class="form-control" name="comments" placeholder="Add a comment">
                                    </div>
                                    <div class="mb-4">
                                        <label for="approxbirthdate">ApproxBirthDate</label>
                                        <input type="text" class="form-control" name="approxbirthdate" placeholder="Enter Approx Birth Date">
                                    </div>
                                    <div class="mb-4">
                                        <label for="approxbirthyear">ApproxBirthYear</label>
                                        <input type="text" class="form-control" name="approxbirthyear" placeholder="Enter Approx Birth Year">
                                    </div>
                                    <div class="mb-4">
                                        <label for="approxdeathyear">ApproxDeathYear</label>
                                        <input type="text" class="form-control" name="approxdeathyear" placeholder="Enter Approx Death Year ">
                                    </div>
                                    <div class="mb-4">
                                        <label for="approxdeathdate">ApproxDeathDate</label>
                                        <input type="text" class="form-control" name="approxdeathdate" placeholder="Enter Approx Death Date">
                                    </div>
                                    <div class="mb-4">
                                        <label for="section">Section</label>
                                        <input type="text" class="form-control" name="section" placeholder="Enter a Section">
                                    </div>
                                    <div class="mb-4">
                                        <label for="stoneoneline">StoneOneLine</label>
                                        <input type="text" class="form-control" name="stoneoneline" placeholder="Enter Stone one line">
                                    </div>
                                    <div class="mb-4">
                                        <label for="stoneonetype">StoneOneType</label>
                                        <input type="text" class="form-control" name="stoneonetype" placeholder="Enter Stone one type">
                                    </div>
                                    <div class="mb-4">
                                        <label for="stoneonenum">StoneOneNum</label>
                                        <input type="text" class="form-control" name="stoneonenum" placeholder="Enter Stone one Number">
                                    </div>
                                    <div class="mb-4">
                                        <label for="stonetwoline">StoneTwoLine</label>
                                        <input type="text" class="form-control" name="stonetwoline" placeholder="Enter Stone two line">
                                    </div>
                                    <div class="mb-4">
                                        <label for="stonetwonum">StoneTwoNum</label>
                                        <input type="text" class="form-control" name="stonetwonum" placeholder="Enter Stone two num">
                                    </div>
                                    <div class="mb-4">
                                        <label for="stonetwotype">StoneTwoType</label>
                                        <input type="text" class="form-control" name="stonetwotype" placeholder="Enter Stone two type">
                                    </div>
                                    <div class="mb-4">
                                        <label for="paces">PacesBetweenStonesInSevenSectionsOnly</label>
                                        <input type="text" class="form-control" name="paces" placeholder="Enter Paces Between Stone in Seven Section only">
                                    </div>
                                    <div class="mb-4">
                                        <label for="semicircle">SemiCircleLocationsOuterInnerFirstInnerSecondInner</label>
                                        <input type="text" class="form-control" name="semicircle" placeholder="Enter Semi Circle Location">
                                    </div>
                                    <div class="mb-4">
                                        <label for="direction">DirectionSemiCircleStonesFace</label>
                                        <input type="text" class="form-control" name="direction" placeholder="Enter Direction Semi Circles Stones Face">
                                    </div>
                                    <div class="mb-4">
                                        <label for="totalnum">TotalNumStonesInLine</label>
                                        <input type="text" class="form-control" name="totalnum" placeholder="Enter Total number of stones in line">
                                    </div>
                                    <div class="mb-4">
                                        <label for="fninline">FirstNameInLine</label>
                                        <input type="text" class="form-control" name="fninline" placeholder="Enter First name in line">
                                    </div>
                                    <div class="mb-4">
                                        <label for="side">Side</label>
                                        <input type="text" class="form-control" name="side" placeholder="Enter Side">
                                    </div>
                                    <div class="mb-4">
                                        <label for="grave">Grave</label>
                                        <input type="text" class="form-control" name="grave" placeholder="Enter Grave">
                                    </div>
                                    <div class="mb-4">
                                        <label for="ledgerpage">LedgerPage</label>
                                        <input type="text" class="form-control" name="ledgerpage" placeholder="Enter Ledger Page">
                                    </div>
                                    <div class="mb-4">
                                        <label for="map1">Map1</label>
                                        <input type="text" class="form-control" name="map1" placeholder="Enter Map1">
                                    </div>
                                    <div class="mb-4">
                                        <label for="map2">Map2</label>
                                        <input type="text" class="form-control" name="map2" placeholder="Enter Map2">
                                    </div>
                                    <div class="mb-4">
                                        <label for="map3">Map3</label>
                                        <input type="text" class="form-control" name="map3" placeholder="Enter Map3">
                                    </div>
                                    <div>
                                        <label for="textarea">Pic 1</label>
                                        <div class="form-file mb-3">
                                            <input type="file" class="form-file-input" id="customFile" name="pic1" onchange="loadFile($(this))">
                                            <label class="form-file-label" for="customFile">
                                                <span class="form-file-text">Choose file...</span>
                                                <span class="form-file-button">Browse</span>
                                            </label>
                                            <img class="img-fluid image-preview" alt="" id="output">
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
                                            <img class="img-fluid image-preview" alt="" id="output">
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
                                            <img class="img-fluid image-preview" alt="" id="output">
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
                                            <img class="img-fluid image-preview" alt="" id="output">
                                        </div>
                                    </div>
                                    <fieldset class="my-4">
                                        <legend class="h6">Status</legend>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked="">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
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
