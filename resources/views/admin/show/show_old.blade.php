@extends('layouts.default')
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col">
        <div id="myDIV">
            <div id="tag1">
                @include('includes.pdf2')
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('after-style')

<style>
#myDIV #tag1 .content{
    height: 100%;
    width: 800px;
    padding :5%;
    margin:auto;
    background-color: white;
    box-shadow: 3px 5px 3px 5px #a3a3a3;
    margin-bottom: 50px;
}
</style>

@endpush
