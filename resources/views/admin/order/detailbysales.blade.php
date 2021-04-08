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
            <a href="{{route('order.all')}}" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                <div class="card" style="margin-top:10px;">
                    <div class="card-body">
                        <h4 class="box-title">
                        <div class="row form-group">
                            List Order Customer 
                            <small> &nbsp; by &nbsp; </small>
                                @if($total_row > 0)
                                    @foreach($data as $row)
                                    <?php $nama_print = $nama_sales[$row->list_id]?>
                                    @endforeach
                                    {{$nama_print}}
                                @endif
                        </div>
                            
                        </h4>
                        
                    </div>
                    <div class="card-body--">
                        <div class="table-responsive table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th id="cek">#</th>
                                        <th>Nama Customer</th>
                                        <th>Tipe</th>
                                        <th>Nomor</th>
                                        <th>Nama Sales</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($total_row > 0)
                                <?php $no = 1 ?>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->nama_customer}}</td>
                                            <td>{{$row->tipe}}</td>
                                            <td>{{$row->nomor}}</td>
                                            <td>{{$nama_sales[$row->list_id]}}</td>
                                            <td>{{$nama_created[$row->list_id]}}</td>
                                            <td>
                                                <a href='/Admin/order/edit/{{$row->list_id}}' class='btn btn-sm btn-info'><i class='fa fa-edit'></i> Edit</a>
                                                <a href='/Admin/order/show/BAKBB/{{$row->list_id}}' class='btn btn-sm btn-warning'><i class='fa fa-eye'></i> Show</a>
                                                <a href='/Admin/order/download/BAKBB/{{$row->list_id}}' class='btn btn-sm btn-success' target='_blank'><i class='fa fa-download'></i> Download</a>
                                                <a href='/Admin/order/delete/{{$row->list_id}}' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                        <tr>
                                            <td colspan="7" class="text-center">Not Found</td>
                                        </tr>
                                @endif
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>
            <div class="text-center " id="paginate">
            {{$data->appends(request()->query())->links()}}
            </div>
        </div>
    </div>
    <!-- /.orders -->
</div>
<!-- .animated -->
@endsection