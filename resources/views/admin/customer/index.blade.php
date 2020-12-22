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
                        <div class="box-title">List Customer <a href="/excel/fb" class="float-right btn btn-sm btn-success"><i class='fa fa-folder-open'></i> Export FB to Excel</a></div>
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
                                                    echo "<a href='/Admin/customer/download/FB/$listC->id'  class='btn btn-sm btn-primary' target='_blank'><i class='fa fa-download'></i> Download</a>";
                                                }  
                                            ?>
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
