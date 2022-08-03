@extends('admin.layouts.main')
@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="{{route('admin_order_list')}}">Orders-List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order-Details</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Order Details</h1>
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
                            <div class="col-md-6"> 
                            <form>
                                <p>Order Details</p>
                                
                                <div class="mb-4">
                                    <label for="title">Invoice number</label>
                                    <input readonly="" disabled="" type="text" class="form-control" required value="{{$order_payment->invoice_number}}" name="title">
                                </div>
                              <div class="mb-4">
                                    <label for="title">Order-id</label>
                                    <input readonly="" disabled="" type="text" class="form-control" required value="{{$order_payment->id}}" name="title">
                                </div>
                                <div class="mb-4">
                                    <label for="title">Payment Method</label>
                                    <input readonly="" disabled="" type="text" class="form-control" required value="{{$order_payment->payment_method}}" name="title">
                                </div>
                                <div class="mb-4">
                                    <label for="title">Total Amount</label>
                                    <input readonly="" disabled="" type="text" class="form-control" required value="${{$order_payment->total_amount}}" name="title">
                                </div>
                                <div class="mb-4">
                                    <label for="title">Total Products</label>
                                    <input readonly="" disabled="" type="text" class="form-control" required value="{{count($order_details)}}" name="title">
                                </div>
                                @if($order_details != '')
                                @foreach($order_details as $key => $value)
                                <p>Product number:{{$key+1}}</p>
                                 <div class="mb-4">
                                    <label for="title">Product id</label>
                                    <input readonly="" disabled="" type="text" class="form-control" required value="{{$value->product_id}}" name="title">
                                </div>
                                 <div class="mb-4">
                                    <label for="title">Product name</label>
                                    <input readonly="" disabled="" type="text" class="form-control" required value="{{$value->item}}" name="title">
                                </div>
                                 <div class="mb-4">
                                    <label for="title">Product Pic ID</label>
                                    <input readonly="" disabled="" type="text" class="form-control" required value="{{$value->pic_id}}" name="title">
                                </div>
                                   <div class="mb-4">
                                    <label for="title">Product Price</label>
                                    <input readonly="" disabled="" type="text" class="form-control" required value="${{$value->price}}" name="title">
                                </div>
                                @endforeach
                                @endif
                            </form>
                            </div>
                            <!-- End of Form -->
                            {{-- second form --}}
                            <div class="col-md-6"> 
                            <form>
                                <p>User Details</p>
                                
                                <div class="mb-4">
                                    <label for="title">User ID</label>
                                    <input readonly="" disabled="" type="text" class="form-control" required value="{{$user_details->id}}" name="title">
                                </div>
                              <div class="mb-4">
                                    <label for="title">User Name</label>
                                    <input readonly="" disabled="" type="text" class="form-control" required value="{{$user_details->name}}" name="title">
                                </div>
                                <div class="mb-4">
                                    <label for="title">Email</label>
                                    <input readonly="" disabled="" type="text" class="form-control" required value="{{$user_details->email}}" name="title">
                                </div>
                               

                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
