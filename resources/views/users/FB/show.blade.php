@extends('layouts.user')
@section('sidebar')
    @include('users.profile.sidebar')
@endsection

@section('content')
<h1 class="mt-4">Show FB</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div id="myDIV">
            <div id="tag1">
                @include('includes.pdf3')
            </div>
        </div>
    </div>
</div>
@endsection
