@extends('master')

@section('content')
<h4>Forgot Password Contractor</h4>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        @if (Session::has('contractor_credential')) {{ '<div class="alert alert-danger" role="alert">Login Failure.</div>' }} @endif
        {{ Form::open(array('action' => 'ContractorController@forgotPasswordProcess')) }}
        <div class="form-group">
            {{ Form::text('email', null, ['placeholder' => 'email', 'class' => 'form-control']) }}

        </div>
        
        <div >
            {{ Form::submit('Recover', ['class' => 'btn btn-primary']) }}
        </div>

        {{ Form::close() }}

    </div>
</div>
<br />

@stop