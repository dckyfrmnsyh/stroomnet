@extends('layouts.app')
@section('content')
<section class="about" id="tambah_pelanggan_form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">TAMBAH ORDER <br> {{$customer->nama_customer}} </h1>
                    </div>
                    <div class="card-body">
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i> Tambah Order
                        </button>
                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{$customer->nama_customer}}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="{{ route('order.store') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="col-md-5 col-form-label">Originating</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                        placeholder="" id="originating"
                                                        name="originating" required><small class="form-text text-muted">*jika
                                                        kosong isi (-)</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-5 col-form-label">Terminating</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"
                                                        placeholder="" id="terminating"
                                                        name="terminating" required>
                                                    <small class="form-text text-muted">*jika kosong isi (-)</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-5 col-form-label">Jenis Layanan</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="nama_product"
                                                        name="nama_product" required>
                                                    <small class="form-text text-muted" >*jika kosong isi (-)</small>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-5 col-form-label">Kapasitas</label>
                                                <div class="col-md-3 ">
                                                    <input type="number" class="form-control" placeholder=""
                                                        id="kapasitas" name="kapasitas" required>
                                                    <small class="form-text text-muted">Ex. 1 Gbps</small>
                                                </div>
                                                <div class="col-md-3">
                                                    <select name="satuan_kapasitas" class="form-control">
                                                        <option value="Mbps">Mbps</option>
                                                        <option value="Gbps">Gbps</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-5 col-form-label">Biaya
                                                    Berlangganan</label>
                                                <div class="col-md-6">
                                                    <input type="number" class="form-control" id="biaya_langganan"
                                                        name="biaya_langganan" required>
                                                    <small class="form-text text-muted" >Ex. 1000000 (Hanya Diisi
                                                        Angka)</small>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-5 col-form-label">Biaya
                                                    Instalasi</label>
                                                <div class="col-md-6">
                                                    <input type="number" class="form-control" id="biaya_instalasi"
                                                        name="biaya_instalasi" required>
                                                    <small class="form-text text-muted">Ex. 1000000 (Hanya Diisi
                                                        Angka)</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- tampilan data -->
                        <div class="form-group">
                            <div class="">
                                <div>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>originating</th>
                                                <th>terminating</th>
                                                <th>nama layanan</th>
                                                <th>kapasitas</th>
                                                <th>biaya langganan</th>
                                                <th>biaya instalasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=0 ?>
                                            @foreach ($order as $p)
                                            <?php $no++ ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $p->originating }}</td>
                                                <td>{{ $p->terminating }}</td>
                                                <td>{{ $p->nama_product }}</td>
                                                <td>{{ $p->kapasitas }}</td>
                                                <td>@currency($p->biaya_langganan)</td>
                                                <td>@currency($p->biaya_instalasi)</td>
                                                <td>
                                                    <a href="/users/new/order/delete/{{ $p->id }}" type="button"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- end of tampilan -->
                    </div>
                    <div class="card-footer">
                        <div class="" style="float: right;">
                            <a class="btn btn-primary" type="button" id="button_next"
                                onclick="konfirmasi()">Selanjutnya</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card"  style="text-align:center;">
                    <div class="card-header">
                        <h2>Tambah Tanggal Penagihan</h2>
                    </div>
                    <form action="{{ route('penagihan.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="card-body"> 
                            <div class="form-group row">
                                <div class="col-md">
                                    <input type="number" class="form-control" id="tgl_penagihan"
                                        name="tgl_penagihan" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
