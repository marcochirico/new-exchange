@extends('master')

@section('content')
<h4>Login Client</h4>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        @if (Session::has('client_credential')) {{ '<div class="alert alert-danger" role="alert"><strong>Error! </strong>Login Failure.</div>' }} @endif
        {{ Form::open(array('action' => 'ClientController@loginAuthorize')) }}
        <div class="form-group">
            {{ Form::text('username', null, ['placeholder' => 'username', 'class' => 'form-control']) }}

        </div>
        <div class="form-group">
            {{ Form::password('password', ['placeholder' => 'password', 'class' => 'form-control']) }}

        </div>
        <div>
            {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
            <span class="pull-right"><a href="/client/forgot-password">Forgot password?</a></span>
        </div>

        {{ Form::close() }}

    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <span>if you are not registered please click the button below.</span><br /><br />
                <button class="btn btn-primary btn-register" data-url="/client/register">Register</button>
                <!--<a href="/client/register">Register</a>-->
            </div>
        </div>
    </div>
</div>
<br />

@stop