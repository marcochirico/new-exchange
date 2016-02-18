@extends('master')

@section('content')
<h3 class="text-center">Edit Profile</h3>

<div class="row panel_list">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        @include('client.adminNavbar')
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?php
        if (Session::has('client_register_errors')):
            $errors = Session::get('client_register_errors');
            ?>
            <div class="alert alert-danger" role="alert"><strong>Error!</strong> Please fill correctly all mandatory fileds.</div>
            <?php
        endif;
        ?>
        <div class="row">
            {{ Form::open(array('action' => 'ClientController@save')) }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>First Name</label>
                    {{ Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Last Name</label>
                    {{ Form::text('last_name', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('last_name'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Company Name</label>
                    {{ Form::text('company_name', null, ['placeholder' => 'Company Name', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('company_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Industry</label>
                    {{ Form::select('industry_id', $data->industryTypes, 'm',['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('industry_id'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Email</label>
                    {{ Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('email'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Confirm Email</label>
                    {{ Form::email('email_confirmation', null, ['placeholder' => 'Confirm Email', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('email_confirmation'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Password</label>
                    {{ Form::password('password', ['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('password'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Confirm Password</label>
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('password_confirmation'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Phone</label>
                    {{ Form::text('phone', null, ['placeholder' => 'Phone', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('phone'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Mobile</label>
                    {{ Form::text('mobile', null, ['placeholder' => 'Mobile', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('mobile'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Fax</label>
                    {{ Form::text('fax', null, ['placeholder' => 'Fax', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('fax'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Address</label>
                    {{ Form::text('address', null, ['placeholder' => 'Address', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('address'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Country</label>
                    {{ Form::select('country_id', $data->countries, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('country_id'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>City</label>
                    {{ Form::text('city', null, ['placeholder' => 'City', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('city'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Zip/Postal Code</label>
                    {{ Form::text('postal_code', null, ['placeholder' => 'Zip/Postal Code', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('postal_code'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Province/State</label>
                    {{ Form::text('province', null, ['placeholder' => 'Province/State', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('province'); ?></span>
                </div>
            </div>

            <div class="text-center">
                {{ Form::submit('Save', ['class' => 'btn btn-primary btn-padding-long']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop