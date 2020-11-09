@extends('layouts.default')

@section('content')
<!-- Orders -->
<div class="orders">
    <!-- /# row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Orders Customer New</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Customer</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Tipe</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Layanan</th>
                                    <th>Print</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0 ?>
                                @forelse($orderlist as $new)
                                <?php $no++ ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{$new->nama_customer}}</td>
                                    <td>{{$new->penanggung_jawab}}</td>
                                    <td>{{$new->tipe}}</td>
                                    <td>{{Date::parse($new->tgl_hari_ini)->format('l, d F Y')}}
                                    </td>
                                    <td>
                                        @foreach($new->order as $item)
                                        {{$item->nama_product}},
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="/Admin/pdf/new/{{$new->id}}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-download"></i> BAKBB
                                                </a>
                                        <a href="/Admin/pdf/fb/{{$new->id}}" class="btn btn-primary btn-sm"><i
                                                class="fa fa-download"></i> FB
                                                </a>
                                    </td>
                                    <td>
                                        <a href="/Admin/dashboard/order/delete/{{ $new->id }}" type="button"
                                            class="btn btn-danger btn-sm">
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
                <div style="margin:auto">
                    {{ $orderlist->links() }}
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->

    </div>
    <!-- /# row -->
</div>
<!-- /.orders -->
@endsection
