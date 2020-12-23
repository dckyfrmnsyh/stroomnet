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
                                        <th>Nama Customer</th>
                                        <th>Tipe</th>
                                        <th>Nomor</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php $no=0 ?>
                                    @foreach($data as $list_data)
                                        @foreach($list_data->list_order as $list)
                                        <?php $no++ ?>
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>
                                                <a>{{$list_data->nama_customer}}</a>
                                            </td>
                                            <td>{{$list->order_data->tipe}}</td>
                                            <td>{{$list->order_data->nomor}}</td>
                                            <td>
                                                {{$nama_user[$list_data->id]}}
                                            </td>
                                            <td>
                                                <a href="/Admin/order/edit/{{$list->id}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="/Admin/order/show/BAKBB/{{$list->id}}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Show</a>
                                                @if($list->order_data->status_publish == 'ya')
                                                <a href="/Admin/order/download/BAKBB/{{$list->id}}" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-download"></i> Download</a>
                                                @endif
                                                <a href="/Admin/order/delete/{{$list->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>
            <div class="text-center">
                {{ $data->links() }}
                <a href="{{route('order.all')}}" class="btn btn-outline-primary">View All</a>
            </div>
        </div>
    </div>
    <!-- /.orders -->
</div>
<!-- .animated -->
@endsection
