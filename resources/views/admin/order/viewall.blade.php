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
                        <h4 class="box-title">
                        <div class="row">
                            List Order Customer 
                            <small> &nbsp; by &nbsp; </small>&nbsp;&nbsp;&nbsp;&nbsp;   
                            <form class="row form-group" action="{{route('order.filter')}}" method="get">
                            <select name="sales" id="sales" class="form-control" style="width: 150px;">
                                <option value=''>==Pilih Sales==</option>
                                @foreach ($sales as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>&nbsp;&nbsp;
                            <button type="submit" class="btn btn-sm btn-info"><i class='fa fa-filter'></i>  Filter</button>
                            </form>
                        </div>
                            <a data-toggle="modal" data-target="#myModal1" href="#" class="float-right btn btn-sm btn-success" style="margin-top: -50px;">
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
                                            <td>{{$nama_created[$row->list_id]}}</td>
                                            <td>{{$nama_sales[$row->list_id]}}</td>
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
@push('after-script')
<script>
// $(document).ready(function () {
//     var empt = '';
//     fetch_data();
//     function fetch_data(id_sales = ''){
//         $.ajax({
//             url: '/Admin/order/sales/filter',
//             method: 'GET',
//             data: {
//                 id_sales:id_sales
//             },
//             dataType: 'json',
//             success: function (data) {
//                 $('tbody').empty();
//                 var obj = JSON.parse(JSON.stringify(data))
//                 var yes = obj.table_data;
//                 console.log(yes);
//                 $('#paginate').html(obj.link);
//                 Object.keys(yes).forEach(function(k){
//                     $('tbody').append(k + ' - ' + yes[k]);
//                 });
//             },error: function(xhr, status, error) {
//             var err = eval("(" + xhr.responseText + ")");
//             alert(err.Message);
//             }
//         })
//     }

//     $(document).on('change', '#sales', function (){
//         var id_sales = $('#sales').val();
//         console.log(id_sales);
//         fetch_data(id_sales);
        
//     });
// });
</script>
@endpush