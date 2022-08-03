@extends('admin.layouts.main')
@section('content')

    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="{{route('admin_profile')}}">Admin-profile</a></li>
                
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit Your Proflie</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-5 mb-4 ml-4">
                <div class="card border-light shadow-sm components-section">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-lg-12 col-sm-12">
                                @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                
                    <li><span class="text-white">{{ $error }}</span></li>
                @endforeach
            </ul>
        </div>
    @endif
                                <!-- Form -->
                                 @if(Session::has('error'))
                                    <div class="alert alert-danger mb-4" id="danger-alert">
                                        <center><span class="text-white">{{Session::get('error')}}</span></center>
                                    </div>
                                @endif
                                @if(Session::has('success'))
                                    <div class="alert alert-success mb-4" id="success-alert">
                                        <center><span class="text-white">{{Session::get('success')}}</span></center>
                                    </div>
                                @endif
                                <form action="{{route('admin_profile_change')}}" method="POST" enctype="multipart/form-data">@csrf
                                    <input type="hidden" name="user_id" value="{{$admin->id}}">
                                    <div class="mb-4">
                                        <label for="name">UserName</label>
                                        <input type="text" class="form-control" name="name" readonly="" disabled="" value="{{$admin->name}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email">Email Address</label>
                                        <input type="text" disabled="" readonly="" class="form-control"  name="email" value="{{$admin->email}}">
                                    </div>
                                     <div class="mb-4">
                                        <label for="old_password">Confirm  Old Password</label>
                                        <input  type="password" class="form-control" required name="old_password">
                                    </div>
                                      <div class="mb-4">
                                        <label for="new_password">New Password</label>
                                        <input type="password" class="form-control" required name="new_password">
                                    </div>
                                     <div class="mb-4">
                                        <label for="title">Confirm Password</label>
                                        <input type="password" class="form-control" required name="confirm_password">
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
