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
                        <h4 class="box-title">List Order Customer 
                            <a data-toggle="modal" data-target="#myModal1" href="#" class="float-right btn btn-sm btn-success">
                                <i class='fa fa-download'></i> 
                                Export BAKBB to Excel
                            </a>
                        </h4>
                        <!-- The Modal -->
                        <div class="modal" id="myModal1">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Filter berdasarkan tanggal kesepakatan</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="/excel/bakbb" method="get">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">jika ada data yang tidak mempunyai tanggal kesepakatan (Tanggal BAKBB) maka tidak akan terexport</div>
                                            <div class="form-group row">
                                                <label class="col-md-3 form-control-label">Start Date:</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="date" id="from" name="from" width="276" required />
                                                </div>
                                            </div>
                                        
                                            <div class="form-group row">
                                                <label class="col-md-3 form-control-label">End Date:</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="date" id="to"  name="to" width="276" required />
                                                </div>
                                            </div>
                                            <!-- end of tgl mulai penagihan -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><i class='fa fa-download'></i>  Export BAKBB to Excel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                        <th>Nama Sales</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php $no=0 ?>
                                    @foreach($data as $list_data)
                                        <?php $no++ ?>
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>
                                                <a>{{$list_data->fb['nama_customer']}}</a>
                                            </td>
                                            <td>{{$list_data->order_data->tipe}}</td>
                                            <td>{{$list_data->order_data->nomor}}</td>
                                            <td>
                                                {{$nama_sales[$list_data->order_data->id]}}
                                            </td>
                                            <td>
                                                {{$nama_user[$list_data->order_data->id]}}
                                            </td>
                                            <td>
                                                <a href="/Admin/order/edit/{{$list_data->id}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="/Admin/order/show/BAKBB/{{$list_data->id}}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Show</a>
                                                @if($list_data->order_data->status_publish == 'ya')
                                                <a href="/Admin/order/download/BAKBB/{{$list_data->id}}" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-download"></i> Download</a>
                                                @endif
                                                <a href="/Admin/order/delete/{{$list_data->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>
            <div class="text-center">
                {{ $data->links() }}
            </div>
        </div>
    </div>
    <!-- /.orders -->
</div>
<!-- .animated -->
@endsection
