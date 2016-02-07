@extends('master')

@section('content')
<h4 class="text-center">Registration Complete</h4>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <span>Your profile has been created correctly.</span><br /><br />
                <button class="btn btn-primary btn-register" data-url="/client/login">Login</button>
            </div>
        </div>
    </div>
</div>
<br />

@stop