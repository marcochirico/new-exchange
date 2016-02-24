@extends('master')

@section('content')
<h3 class="text-center">Edit Profile</h3>

<div class="row panel_list">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        @include('client.adminNavbar')
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?php
        if (Session::has('client_update_errors')):
            $errors = Session::get('client_update_errors');
            ?>
            <div class="alert alert-danger" role="alert"><strong>Error!</strong> Please fill correctly all mandatory fileds.</div>
            <?php
        endif;
        if (Session::has('client_update_confirm')):
            ?>
            <div class="alert alert-danger" role="alert"><strong>Done!</strong> your profile has been correctly updated.</div>
            <?php
        endif;
        ?>
        <div class="row">
            {{ Form::open(array('action' => 'ClientController@update')) }}
            <input type="hidden" name="client_id" value="{{$data->details->client_id}}" />
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>First Name</label>
                    {{ Form::text('first_name', $data->details->first_name, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Last Name</label>
                    {{ Form::text('last_name', $data->details->last_name, ['placeholder' => 'Last Name', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('last_name'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Company Name</label>
                    {{ Form::text('company_name', $data->details->company_name, ['placeholder' => 'Company Name', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('company_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Industry</label>
                    {{ Form::select('industry_id', $data->industryTypes, $data->details->industry_id,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('industry_id'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Phone</label>
                    {{ Form::text('phone', $data->details->phone, ['placeholder' => 'Phone', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('phone'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Mobile</label>
                    {{ Form::text('mobile', $data->details->mobile, ['placeholder' => 'Mobile', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('mobile'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Fax</label>
                    {{ Form::text('fax', $data->details->fax, ['placeholder' => 'Fax', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('fax'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Address</label>
                    {{ Form::text('address', $data->details->address, ['placeholder' => 'Address', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('address'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Country</label>
                    {{ Form::select('country_id', $data->countries, $data->details->country_id,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('country_id'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>City</label>
                    {{ Form::text('city', $data->details->city, ['placeholder' => 'City', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('city'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Zip/Postal Code</label>
                    {{ Form::text('postal_code', $data->details->postal_code, ['placeholder' => 'Zip/Postal Code', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('postal_code'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Province/State</label>
                    {{ Form::text('province', $data->details->province, ['placeholder' => 'Province/State', 'class' => 'form-control']) }}
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