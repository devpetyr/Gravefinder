@extends('admin.layouts.main')
@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Order-List</h1>
        </div>
       
    </div>
</div>

<div class="card border-light shadow-sm mb-4">
    <div class="card-body">
        @if(Session::has('delete'))
            <div class="alert alert-danger mb-4" id="success-alert">
                <center><span class="text-white">{{Session::get('delete')}}</span></center>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded" id="table_id">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0">#</th>
                        <th class="border-0">User ID</th>
                        <th class="border-0">Payment Method</th>
                        <th class="border-0">Total Amount</th>
                        <th class="border-0">Total Products</th>
                        <th class="border-0">Status</th>
                        <th class="border-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Item -->
                        <!-- Start of Item -->
                        @foreach($list as $key=>$value)
                        <?php
                        $username = App\Models\User::where('id',$value->user_id)->first();
                        ?>
                            <tr>
                                <td class="border-0"><a href="#" class="text-primary font-weight-bold">{{$key+1}}</a> </td>
                                <td class="border-0 font-weight-bold">{{$username->name}}</td>
                                <td class="border-0 font-weight-bold">{{$value->payment_method}}</td>
                                <td class="border-0 font-weight-bold">${{$value->total_amount}}</td>
                                <td class="border-0 font-weight-bold">{{$value->number_of_products}}</td>
                              
                                <td class="border-0 font-weight-bold">
                                    <span class="{{$value->status == 1 ? 'text-success' : 'text-danger'}}">{{$value->status == 1 ? 'Active' : 'Inactive'}}</span>
                                </td>
                                 <td class="border-0">
                                <a href="{{route('admin_orders_view').'/'.$value->id}}" class="text-secondary mr-3"><i class="fas fa-edit"></i>View</a>
                            </td>
                            </tr>
                        @endforeach
                        <!-- End of Item -->
                    <!-- Item -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endpush
