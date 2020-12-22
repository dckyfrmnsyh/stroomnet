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
                        <li><a href="/Admin/user">User</a></li>
                        <li><a href="/Admin/user">List User</a></li>
                        <li class="active">Edit User</li>
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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Create</strong> Customer Account
                    </div>
                    <form action="/Admin/user/update/{{$user->id}}" method="post">
                        @csrf
                        <div class="card-body card-block">
                            <div class="form-group">
                            <label for="name" class="form-control-label">Nama user</label>
                            <input  type="text"
                                    name="name" 
                                    value="{{ old('name') ? old('name') : $user->name }}" 
                                    class="form-control @error('name') is-invalid @enderror"/>
                            @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-control-label">Email</label>
                            <input  type="email"
                                    name="email" 
                                    value="{{ old('email') ? old('email') : $user->email }}" 
                                    class="form-control @error('email') is-invalid @enderror"/>
                            @error('email') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-control-label">Password</label>
                            <input id="password" type="password" class="form-control{{$errors->has('password') ? ' is-invalid' :'' }}" name="password" required>
                            @error('password') <div class="text-muted">{{ $message }}</div> @enderror
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
                                <i class="fa fa-dot-circle-o"></i> Update
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


