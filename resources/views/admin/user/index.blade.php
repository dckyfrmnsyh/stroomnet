@extends('layouts.default')

@section('breadcrumbs')
<div class="breadcrumbs-inner">
    <div class="row m-0">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>User</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">User</a></li>
                        <li class="active">List User</li>
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
                        <h4 class="box-title">List User <a href="/excel/user" class="float-right btn btn-sm btn-success"><i class='fa fa-folder-open'></i> Export User Account to Excel</a></h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0 ?>
                                    @forelse($user as $listC)
                                    <?php $no++ ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>
                                            <a href="/Admin/user/edit/{{$listC->id}}" >{{$listC->name}}</a>
                                        </td>
                                        <td>{{$listC->email}}</td>
                                        @if($listC->hasRole('admin'))
                                        <td><span class="badge badge-complete">Admin</span></td>
                                        @elseif($listC->hasRole('sales'))
                                        <td><span class="badge badge-pending">Sales</span></td>
                                        @endif
                                        <td>
                                            <a href="/Admin/user/delete/{{$listC->id}}" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
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
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Create</strong> User Account
                    </div>
                    <form action="{{ route('customer.user_store') }}" method="post">
                        @csrf
                        <div class="card-body card-block">
                            <div class="form-group"><label for="name" class=" form-control-label">User
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
                            <div class="form-group">
                                <label for="password" class=" form-control-label">Role</label>
                                <label for="inline-radio1" class="form-control ">
                                    <input type="radio" id="inline-radio1" name="role" value="admin" class="form-check-input">Admin
                                </label>
                                <label for="inline-radio2" class="form-control ">
                                    <input type="radio" id="inline-radio2" name="role" value="sales" class="form-check-input">Sales
                                </label>
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
