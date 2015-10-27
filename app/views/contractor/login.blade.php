@extends('master')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <h4>Login Contractor</h4>
        {{ Form::open(array('action' => 'ContractorController@login')) }}

        <div class="form-group">
            {{ Form::text('username', null, ['placeholder' => 'username', 'class' => 'form-control']) }}
            @if ($errors->has('username')) {{ '<div class="alert alert-danger" role="alert">invalid username</div>' }} @endif
        </div>

        <div class="form-group">
            {{ Form::password('password', ['placeholder' => 'password', 'class' => 'form-control']) }}
            @if ($errors->has('password')) {{ '<div class="alert alert-danger" role="alert">invalid password</div>' }} @endif
        </div>

        @if ($errors->has('credentials')) {{ '<div class="alert alert-danger" role="alert">'.$errors->first('credentials').'</div>' }} @endif

        <div class="text-center">
            {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
        </div>

        {{ Form::close() }}

        <a href="/contractor/forgot">Forgot password?</a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="text-center"><a href="/contractor/register">Register</a></div>
    </div>
</div>


@stop