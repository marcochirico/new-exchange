@extends('master')

@section('content')
<h3>Dashboard client</h3>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        @include('client.adminNavbar')
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
        Panel right
    </div>
</div>
@stop