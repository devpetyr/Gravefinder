@extends('layouts.main')
@section('content')
    <!-- main -->
    <main>
        <section class="mainSec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 centerCol">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="fasq-main me_hed">
                                    <div class="Whitemain white_2">
                                        <div class="ownname text-center">
                                            <span>My Orders</span>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="table_id">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th class="border-0">#</th>
                                                    <th class="border-0">Invoice Number</th>
                                                    <th class="border-0">Quantity</th>
                                                    <th class="border-0">Product Details</th>
                                                    <th class="border-0">Total Price</th>
{{--                                                    <th class="border-0">Prices</th>--}}
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $key => $value)

                                                    <tr>
                                                        <td class="border-0 font-weight-bold">{{$key+1}}</td>
                                                        <td class="border-0 font-weight-bold">{{$value->invoice_number}}</td>
                                                        <td class="border-0 font-weight-bold">{{$value->number_of_products}}</td>

                                                        <td class="border-0 font-weight-bold">
                                                            @foreach($value->orderdetail as $key => $detail)
                                                                {{$key+1}}# {{$detail->item}}<br>
                                                            @endforeach
                                                        </td>

                                                        <td class="border-0 font-weight-bold">${{$value->total_amount}}</td>
{{--                                                        <td class="border-0 font-weight-bold">--}}
{{--                                                            @foreach($value->orderdetail as $key => $detail)--}}
{{--                                                                {{$key+1}}: ${{$detail->price}}<br>--}}
{{--                                                            @endforeach--}}
{{--                                                        </td>--}}
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- end main -->
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table_id').DataTable();
        });
    </script>
@endsection