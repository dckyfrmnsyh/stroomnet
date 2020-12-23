@extends('layouts.default')

@section('breadcrumbs')
<div class="breadcrumbs-inner">
    <div class="row m-0">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Data Icons</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Edit Data Icons</li>
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
                        <strong>Edit</strong> Data Icon
                    </div>
                    <form action="{{route('data.icons.update')}}" method="post">
                        @csrf
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="nama_pj" class="form-control-label">Nama Penanggung jawab</label>
                                <input type="text" name="nama_pj" value="{{ old('nama_pj') ? old('nama_pj') : $data->nama_pj }}"
                                    class="form-control @error('nama_pj') is-invalid @enderror" />
                                @error('nama_pj') <div class="text-muted">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label for="jabatan_pj" class="form-control-label">Jabatan Penanggung jawab</label>
                                <input type="text" name="jabatan_pj" value="{{ old('jabatan_pj') ? old('jabatan_pj') : $data->jabatan_pj }}"
                                    class="form-control @error('jabatan_pj') is-invalid @enderror" />
                                @error('jabatan_pj') <div class="text-muted">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="form-control-label">Jabatan Penanggung jawab</label>
                                <input type="text" name="alamat" value="{{ old('alamat') ? old('alamat') : $data->alamat }}"
                                    class="form-control @error('alamat') is-invalid @enderror" />
                                @error('alamat') <div class="text-muted">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_telp" class="form-control-label">Jabatan Penanggung jawab</label>
                                <input type="text" name="no_telp" value="{{ old('no_telp') ? old('no_telp') : $data->no_telp }}"
                                    class="form-control @error('no_telp') is-invalid @enderror" />
                                @error('no_telp') <div class="text-muted">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_fax" class="form-control-label">Jabatan Penanggung jawab</label>
                                <input type="text" name="no_fax" value="{{ old('no_fax') ? old('no_fax') : $data->no_fax }}"
                                    class="form-control @error('no_fax') is-invalid @enderror" />
                                @error('no_fax') <div class="text-muted">{{ $message }}</div> @enderror
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
