@extends('layouts.default')

@section('content')
<!-- Orders -->
<div class="orders">
    <!-- downgradelist -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Orders Customer Downgrade</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Customer</th>
                                    <th>Tipe</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Layanan Lama</th>
                                    <th>Layanan Baru</th>
                                    <th>Print</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0 ?>
                                @forelse($downgradelist as $downlist)
                                <?php $no++ ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{$downlist->nama_customer}}</td>
                                    <td>{{$downlist->tipe}}</td>
                                    <td>{{Date::parse($downlist->tgl_hari_ini)->format('l, d F Y')}}
                                    </td>
                                    <td>
                                        @foreach($downlist->oldorder as $item)
                                        {{$item->nama_product}},
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($downlist->order as $item)
                                        {{$item->nama_product}},
                                        @endforeach
                                    </td>
                                    <td>
                                    <a href="/Admin/pdf/old/{{$downlist->id}}" class="btn btn-warning btn-sm"><i
                                                class="fa fa-download"></i> BAKBB
                                                </a>
                                        <a href="/Admin/pdf/fb/{{$downlist->id}}" class="btn btn-primary btn-sm"><i
                                                class="fa fa-download"></i> FB</a>
                                    </td>
                                    <td>
                                        <a href="/Admin/dashboard/order/delete/{{ $downlist->id }}" type="button"
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
                {{ $downgradelist->links() }}
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->

    </div>
    <!-- /.downgradelist -->
</div>
<!-- /.orders -->
@endsection
