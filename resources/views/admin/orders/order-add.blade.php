@extends('admin.layouts.main')
@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_banners')}}">Banner-List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Banner-Add</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Banner Add</h1>
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
                            <form action="{{route('admin_banners_add_edit')}}" method="POST" enctype="multipart/form-data">@csrf
                                <div class="mb-4">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" required name="title">
                                </div>
                                <div class="my-4">
                                    <label for="textarea">Description</label>
                                    <textarea class="form-control" placeholder="Enter your message..." id="textarea" rows="4" name="description"></textarea>
                                    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

                                    <script>

                                        CKEDITOR.replace( 'textarea' );

                                    </script>
                                </div>
                                <div>
                                    <label for="textarea">Banner Image</label>
                                    <div class="form-file mb-3">
                                        <input type="file" class="form-file-input" id="customFile" required name="images" onchange="loadFile($(this))">
                                        <label class="form-file-label" for="customFile">
                                            <span class="form-file-text">Choose file...</span>
                                            <span class="form-file-button">Browse</span>
                                        </label>
                                        <img class="img-fluid image-preview" alt="" id="output">
                                    </div>
                                    <div class="mb-4">
                                                <label class="my-1 mr-2" for="country"> Page Name</label>
                                                <select class="form-select" id="page_name" name="page_name">
                                                    <option selected hidden disabled>Select Page Name</option>
                                                    <option value="home">Home</option>
                                                    <option value="online-course">Online Courses</option>
                                                    <option value="live-online-course">Live Courses</option>
                                                    <option value="faq">FAQ</option>
                                                </select>
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
