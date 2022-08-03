@extends('admin.layouts.main')
@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item active" aria-current="page">Search Orders</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Searches Order-List</h1>
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
                        <th class="border-0">Invoice Number</th>
                        <th class="border-0">Payment Method</th>
                        <th class="border-0">Searches Bought</th>
                        <th class="border-0">Amount</th>
                        <th class="border-0">Status</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <!-- Item -->
                        <!-- Start of Item -->
                        @foreach($list as $key=>$value)
                        {{-- @dd($value); --}}
                        <?php
                        $user_details = App\Models\User::select('name')->where('id',$value->user_id)->first();
                        ?>
                            <tr>
                                <td class="border-0"><a href="#" class="text-primary font-weight-bold">{{$key+1}}</a> </td>
                                <td class="border-0 font-weight-bold">{{$value->user_id}}</td>
                                <td class="border-0 font-weight-bold">{{$value->invoice_number}}</td>
                                <td class="border-0 font-weight-bold">{{$value->payment_method}}</td>
                                <td class="border-0 font-weight-bold">{{$value->searches}}</td>
                                <td class="border-0 font-weight-bold">${{$value->amount}}</td>
                              
                                <td class="border-0 font-weight-bold">
                                    <span class="{{$value->status == 1 ? 'text-success' : 'text-danger'}}">{{$value->status == 1 ? 'Active' : 'Inactive'}}</span>
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
