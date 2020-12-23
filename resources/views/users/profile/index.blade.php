@extends('layouts.user')
@section('sidebar')
    @include('users.profile.sidebar')
@endsection
@section('content')
<h1 class="mt-4">BAKBB</h1>
@if($count_fb >= 1)
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tipe</th>
                <th>Tanggal Kesepakatan</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1 @endphp
            @foreach($list_order as $list)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$list->order_data->tipe}}</td>
                <td>{{$list->order_data->tanggal_kesepakatan}}</td>
                <td>{{$nama_user[$list->order_data->id]}}</td>
                <td>
                    <a href="/users/profile/bakbb/edit/{{$list->id}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                    <a href="/users/profile/bakbb/show/{{$list->id}}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> Show</a>
                    @if($list->order_data->status_publish == 'ya')
                    <a href="/users/profile/bakbb/download/{{$list->id}}" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-download"></i> Download</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
    {{ $list_order->links() }}
</div>
@else
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tipe</th>
                <th>Tanggal Kesepakatan</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
@endif
@endsection
