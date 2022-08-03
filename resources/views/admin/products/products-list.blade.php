@extends('admin.layouts.main')
@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Products-List</h1>
            </div>
            <div>
                <a href="{{route('admin_products_add')}}" class="btn btn-outline-gray"><i class="far fa-plus-square mr-1"></i> Add New Product</a>
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
                <table class="table table-centered table-nowrap mb-0 rounded data-table">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-0">#</th>
                        <th class="border-0">First Name</th>
                        <th class="border-0">Last Name</th>
                        <th class="border-0">Burial</th>
                        <th class="border-0">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
  {{--   <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script> --}}
 
@endpush
@section('js')
   <script type="text/javascript">
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin_products') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data: 'FirstName', name: 'FirstName'},
                {data: 'LastName', name: 'LastName'},
                {data: 'Burial', name: 'Burial'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>

@endsection
