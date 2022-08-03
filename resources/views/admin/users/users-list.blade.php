@extends('admin.layouts.main')
@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Users-List</h1>
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
                        <th class="border-0">UserName</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">User Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Item -->
                    <!-- Start of Item -->
                    @foreach($user as $key=>$value)
                        <tr>
                            
                            <td class="border-0"><a href="#" class="text-primary font-weight-bold">{{$key+1}}</a> </td>
                            <td class="border-0 font-weight-bold">{{$value->name}}</td>
                            <td class="border-0 font-weight-bold">{{$value->email}}</td>
                            <td class="border-0 font-weight-bold">
                                {{$value->user_role == 0 ? 'Admin' : '' }}
                                {{$value->user_role == 1 ? 'User' : ''}}
                                {{$value->user_role == 3 ? 'Vendor' : ''}}
                                {{$value->user_role == 4 ? 'Customer' : ''}}
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
