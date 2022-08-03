@extends('admin.layouts.main')
@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_faqs')}}">Faq-List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Faq-Edit</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Faq Edit</h1>
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
                            <form action="{{route('admin_faqs_add_edit').'/'.$faq->id}}" method="POST" enctype="multipart/form-data">@csrf
                                <div class="mb-4">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" required value="{{$faq->title}}" name="title">
                                </div>
                                <div class="my-4">
                                    <label for="textarea">Description</label>
                                    <textarea class="form-control" placeholder="Enter your message..." id="textarea" rows="4" name="description">{{$faq->description}}</textarea>
                                   
                                    </script>
                                </div>
                                <fieldset class="my-4">
                                    <legend class="h6">Status</legend>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" {{ $faq->status === 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="exampleRadios1">
                                          Active
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0" {{ $faq->status === 0 ? 'checked' : ''}}>
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
