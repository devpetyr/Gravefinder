@extends('admin.layouts.main')
@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_newside_map')}}">NewSide Map-List</a></li>
            <li class="breadcrumb-item active" aria-current="page">NewSide Map-Add</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">NewSide Map Add</h1>
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
                            <form action="{{route('admin_newside_map_add_edit')}}" method="POST" enctype="multipart/form-data">@csrf
                              
                                <div>
                                    <input type="hidden" name="map_id">
                                    <label for="textarea">New Side Map Image</label>
                                    <div class="form-file mb-3">
                                        <input type="file" class="form-file-input" id="customFile" multiple="multiple" required name="images[]"  onchange="loadFile($(this))">
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
