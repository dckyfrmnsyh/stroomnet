@extends('layouts.default')

@section('breadcrumbs')
<div class="breadcrumbs-inner">
    <div class="row m-0">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Order</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/Admin/order">Order</a></li>
                        <li class="active">Show BAKBB</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="about" id="tambah_pelanggan_form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-bottom:20px;">
                <div class="text-center" style="margin-bottom:20px;">
                    
                </div>
                <div class="row justify-content-center">
                    <div class="col-md">
                        <div id="myDIV">
                        @include('includes.pdf1')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

