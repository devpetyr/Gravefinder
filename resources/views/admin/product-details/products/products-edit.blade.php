@extends('admin.layouts.main')
@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="{{route('admin_products')}}">Product-List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product-Add</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Product Add</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
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
                                @if(Session::has('update'))
                                    <div class="alert alert-success mb-4" id="success-alert">
                                        <center><span class="text-white">{{Session::get('update')}}</span></center>
                                    </div>
                                @endif
                                <form action="{{route('admin_products_add_edit').'/'.$products->id}}" method="POST" enctype="multipart/form-data">@csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label for="title">Title</label>
                                                <input value="{{$products->title}}" type="text" class="form-control" required name="title" placeholder="Enter your title...">
                                            </div>
                                            <div class="my-4">
                                                <label for="textarea">Description</label>
                                                <textarea  class="form-control" placeholder="Enter your message..." id="textarea" rows="5" name="description">{{$products->description}}</textarea>
                                            </div>
                                            <fieldset class="my-4">
                                                <legend class="h6">Status</legend>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" {{$products->status == 1 ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Active
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0" {{$products->status == 0 ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Inactive
                                                    </label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-4">
                                                        <label for="title">Price</label>
                                                        <input value="{{$products->price}}" type="number" class="form-control" required name="price" placeholder="Enter your price...">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-4">
                                                        <label for="textarea">Discounted Price</label>
                                                        <input value="{{$products->discounted_price}}" type="text" class="form-control" required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="title">Stock</label>
                                                <input value="{{$products->stock}}" type="number" class="form-control" required name="stock" placeholder="Enter your stock...">
                                            </div>
                                            <div>
                                                <label for="textarea">Image</label>
                                                <div class="form-file mb-3">
                                                    <input type="file" class="form-file-input" id="customFile" multiple name="images[]" onchange="loadFile(this)">
                                                    <label class="form-file-label" for="customFile">
                                                        <span class="form-file-text">Choose file...</span>
                                                        <span class="form-file-button">Browse</span>
                                                    </label>
                                                    <div id="imagediv">
                                                        @foreach($product_images as $images)
                                                            <img class="img-fluid image-preview" width="200" height="200" src="{{asset('uploads/products/'.$images->title)}}">
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" name="is_discounted" type="checkbox" id="dis" value="1" {{$products->is_discounted == 1 ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="flexSwitchCheckChecked">Discounted</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" name="is_featured" type="checkbox" id="flexSwitchCheckChecked" {{$products->is_featured == 1 ? 'checked' : ''}} value="1">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked">Featured</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4" id="dis_div">
                                                <div class="mb-4">
                                                    <label for="">Discounted Percentage</label>
                                                    <input type="number" class="form-control" id="dis_percentage" name="discounted_percentage" value="{{$products->discounted_percentage}}" placeholder="Enter your dicounted percentage...">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
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
