@extends('master')

@section('content')
<h4 class="text-center">Recover Password Client</h4>
<br />
<div class="row">
    <div class="col-md-offset-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        @if (Session::has('contractor_credential')) {{ '<div class="alert alert-danger" role="alert">Login Failure.</div>' }} @endif
        {{ Form::open(array('action' => 'ClientController@forgotPasswordRecover')) }}
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>New Password</label>
            {{ Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
            <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
        </div>
        
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Confirm New Password</label>
            {{ Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
            <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
        </div>
        <div class="text-center">
            {{ Form::submit('Change password', ['class' => 'btn btn-primary btn-padding-long']) }}
        </div>
        {{ Form::close() }}

    </div>
</div>
<br />

@stop