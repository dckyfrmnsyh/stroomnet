@extends('layouts.default')

@section('breadcrumbs')
<div class="breadcrumbs-inner">
    <div class="row m-0">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Customer</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Customer</a></li>
                        <li class="active">List Customer</li>
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
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="box-title">List Customer 
                            <a data-toggle="modal" data-target="#myModal1" href="#" class="float-right btn btn-sm btn-success">
                                <i class='fa fa-download'></i> 
                                Export FB to Excel
                            </a>
                        </div>
                        <!-- The Modal -->
                        <div class="modal" id="myModal1">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Filter berdasarkan tanggal kesepakatan</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="/excel/fb" method="get">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
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
                                            <button type="submit" class="btn btn-primary"><i class='fa fa-download'></i>  Export FB to Excel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Customer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0 ?>
                                    @forelse($customer as $listC)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>
                                            <a href="/Admin/customer/acc_edit/{{$listC->id}}" >{{$listC->name}}</a>
                                        </td>
                                        <td>
                                            <?php 
                                                // echo $setbtn[$listC->id];
                                                if ($setbtn[$listC->id] == 0){
                                                    echo "<a href='/Admin/customer/create/FB/$listC->id'  class='btn btn-sm btn-success'><i class='fa fa-plus'></i> create FB</a>";
                                                }
                                                else if($setbtn[$listC->id] >= 1){
                                                    echo "<a href='/Admin/customer/show/FB/$listC->id'  class='btn btn-sm btn-warning'><i class='fa fa-eye'></i> FB</a>";
                                                    echo' ';
                                                    if($fb[$listC->id] == 'ya'){
                                                        echo "<a href='/Admin/customer/download/FB/$listC->id'  class='btn btn-sm btn-primary' target='_blank'><i class='fa fa-download'></i> Download</a>";
                                                    }  
                                                }
                                            ?>
                                            @if(auth()->user()->hasRole('admin'))
                                            <a href='/Admin/customer/delete/{{$listC->id}}'  class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Delete</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-5">
                                            Data tidak tersedia
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
                {{ $customer->links() }}
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Create</strong> Customer Account
                    </div>
                    <form action="{{ route('customer.acc_store') }}" method="post">
                        @csrf
                        <div class="card-body card-block">
                            <div class="form-group"><label for="name" class=" form-control-label">Customer
                                    Name</label>
                                <input type="name" id="name" name="name" placeholder="Enter name.."
                                    class="form-control">
                                <small class="help-block">Please enter your name</small>
                            </div>
                            <div class="form-group"><label for="email" class=" form-control-label">Email</label>
                                <input type="email" id="email" name="email" placeholder="Enter Email.."
                                    class="form-control">
                                <small class="help-block">Please enter your email</small>
                            </div>
                            <div class="form-group"><label for="password" class=" form-control-label">Password</label>
                                <input type="password" id="password" name="password" placeholder="Enter Password.."
                                    class="form-control">
                                <small class="help-block">Please enter your password</small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm float-right">
                                <i class="fa fa-dot-circle-o"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.orders -->
</div>
<!-- .animated -->
@endsection
@push('before-script')

<script>
    function edit() {
        var y = document.getElementById("formt");
        if (y.style.display === "none") {
            y.style.display = "inline-block";
        } else {
            y.style.display = "none";
        }
    }
</script>

@endpush
