@extends('layouts.default')

@section('breadcrumbs')
<div class="breadcrumbs-inner">
    <div class="row m-0">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Order</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Order</a></li>
                        <li class="active">List Order Customer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- Animated -->
<div class="animated fadeIn">
    <!-- Orders -->
    <div class="orders">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <a href="{{route('order.search')}}" class="btn btn-md btn-primary"><i class="fa fa-plus"></i> Create</a>
                <div class="card" style="margin-top:10px;">
                    <div class="card-body">
                        <h4 class="box-title">List Order Customer</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-responsive table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sales</th>
                                        <th>Created Between Months</th>
                                        <th>Revenue Monthly</th>
                                        <th>Instalasi</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales as $s)
                                    <tr>
                                        <td>#</td>

                                        <td>
                                            {{$s->name}}
                                        </td>

                                        <td>
                                            {{$from}} - {{$to}}
                                        </td>
                                        
                                        <td>
                                            @currency($revenue[$s->id])
                                        </td>
                                        
                                        <td>
                                            @currency($instalasi[$s->id])
                                        </td>

                                        <td>
                                            @currency($total[$s->id])
                                        </td>

                                        <!-- search data until list order -->
                                        <!-- search layanan orders berdasarkan sales dan created_at order_data -->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.orders -->
</div>
<!-- .animated -->
@endsection
