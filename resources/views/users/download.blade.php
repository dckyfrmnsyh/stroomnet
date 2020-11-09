@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row align-items-center justify-content-md-center">

        <div class="col-md-auto" style="">
            <div id="app1"></div>
        </div>
    </div>
    <div class="row align-items-center justify-content-md-center">

        <div class="col-md-auto" style="margin-top:10px">
            <div class="alert alert-warning btn-outline-danger" style="width:100%">
                <strong><span class="blink">Warning!</span></strong>
                Silahkan Melakukan Download File dibawah ini sebelum melakukan penyelesaian
            </div>
        </div>
    </div>
    <div class="row align-items-center justify-content-md-center">
        @foreach($customer as $c_new)
        <div class="col-md-auto">
            <a href="/users/download/newBAKBB/{{ $c_new->id }}" class="btn btn-warning btn-lg float-left"
                style="margin:5px"><i class="fa fa-download"></i> BAKBB
            </a>
            <a href="/users/download/FB/{{ $c_new->id }}" class="btn btn-primary btn-lg float-right"
                style="margin:5px"><i class="fa fa-download"></i> FB
            </a>
        </div>
        @endforeach
    </div>
    <div class="row align-items-center justify-content-md-center">
        <div class="col-md-auto" style="margin-top:20px;">
            <button onclick="myFunction()" class="btn btn-outline-info btn-lg float-left"><i class="fa fa-eye"></i>
                Preview
            </button>
        </div>
    </div>
    <div class="row align-items-center justify-content-md-center">
        <div class="col-md-auto" style="margin-top:10px;">
            <div id="myDIV" style="display:none;">
                <div id="tag1"
                style="height: 100%;width: 800px;margin-left: auto;margin-right: auto;background-color: white;box-shadow: 3px 5px 3px 5px #a3a3a3;margin-top: 20px;">
                @include('includes.pdf1')
                </div>
                <div id="tag1"
                style="height: 100%;width: 800px;margin-left: auto;margin-right: auto;background-color: white;box-shadow: 3px 5px 3px 5px #a3a3a3;margin-top: 20px;">
                @include('includes.pdf3')
                </div>

            </div>
        </div>
    </div>
    <?php $id = 1 ?>
    <div class="row align-items-center justify-content-md-center">
        <div class="col-md-auto" style="margin-top:100px;">
            <a id="edit" data-id="" onClick="edit()" class="btn btn-primary btn-lg float-left"
                style="margin:5px;visibility:hidden;"><i class="fa fa-edit"></i> Edit
            </a>
        </div>
        <div class="col-md-auto" style="margin-top:100px;">
            <a id="done" href="/users/thankyou" class="btn btn-success btn-lg float-left"
                style="margin:5px;visibility:hidden;"><i class="fa fa-check"></i> SELESAI
            </a>
        </div>
    </div>
</div>
@endsection
