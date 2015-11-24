@extends('master')

@section('content')
<h3 class="text-center">Register client</h3>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php
        if (Session::has('client_register_errors')):
            ?>
            <div class="alert alert-danger" role="alert"><?php echo Utils\Helper::showValidatorErrorsListed(Session::get('client_register_errors')); ?></div>
            <?php
        endif;
        ?>
        @if (Session::has('client_register_errors')) {{ '' }} @endif
        <div class="row">
            {{ Form::open(array('action' => 'ClientController@save')) }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>First Name</label>
                    {{ Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Last Name</label>
                    {{ Form::text('last_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Company Name</label>
                    {{ Form::text('company_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Industry</label>
                    {{ Form::text('industry_id', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Email</label>
                    {{ Form::text('email', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Confirm Email</label>
                    {{ Form::text('email_confirm', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Phone</label>
                    {{ Form::text('phone', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Mobile</label>
                    {{ Form::text('mobile', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Fax</label>
                    {{ Form::text('fax', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Address</label>
                    {{ Form::text('address', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Country</label>
                    {{ Form::text('country', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>City</label>
                    {{ Form::text('city', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Zip/Postal Code</label>
                    {{ Form::text('postal_code', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Province/State</label>
                    {{ Form::text('state', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Generic / Most likely requirement</label>
                    {{ Form::text('likely_requirement_id', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="client_discaimer">
                        Terms and conditions
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label>Agree Terms & Conditions</label>
                    {{ Form::checkbox('terms', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="text-center">
                {{ Form::submit('Register', ['class' => 'btn btn-primary']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
