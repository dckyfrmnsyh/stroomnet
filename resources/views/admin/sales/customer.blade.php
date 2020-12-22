@extends('layouts.default')

@section('content')
<!-- Animated -->
<div class="animated fadeIn">
    <!-- Orders -->
    <div class="orders">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div><a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Create Customer</a></div><br>
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">List Customer</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Customer</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <a href="">Pt.Ku</a>
                                        </td>
                                        <td>Ahh Mantap</td>
                                        <td>
                                            <a href="" class="btn-sm btn-warning"><i class="fa fa-eye"></i> Show FB</a>
                                            <a href="" class="btn-sm btn-primary"><i class="fa fa-download"></i> Download</a>
                                        </td>
                                    </tr>
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
