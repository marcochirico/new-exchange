@extends('master')

@section('content')
<h3 class="text-center">Register contractor</h3>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php
        if (Session::has('contractor_register_errors')):
            $errors = Session::get('contractor_register_errors');
            ?>
            <div class="alert alert-danger" role="alert"><strong>Error!</strong> Please fill correctly all mandatory fileds.</div>
            <?php
        endif;
        ?>
        <div class="row">
            {{ Form::open(array('action' => 'ContractorController@save')) }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>First Name</label>
                    {{ Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Middle Name</label>
                    {{ Form::text('middle_name', null, ['placeholder' => 'Middle Name', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('middle_name'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Last Name</label>
                    {{ Form::text('last_name', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('last_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Address</label>
                    {{ Form::text('address', null, ['placeholder' => 'Address', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('address'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Citizenship Country</label>
                    {{ Form::select('citizenship_country_id', $data->countries, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('citizenship_country_id'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Residence Country</label>
                    {{ Form::select('residence_country_id', $data->countries, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('residence_country_id'); ?></span>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>City</label>
                    {{ Form::text('city', null, ['placeholder' => 'City', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('city'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Province/State</label>
                    {{ Form::text('province', null, ['placeholder' => 'Province/State', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('province'); ?></span>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Zip/Postal Code</label>
                    {{ Form::text('postal_code', null, ['placeholder' => 'Zip/Postal Code', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('postal_code'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Linkedin Profile</label>
                    {{ Form::text('linkedin_profile', null, ['placeholder' => 'Zip/Postal Code', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('linkedin_profile'); ?></span>
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
                    <label>Work Situation</label>
                    {{ Form::select('work_situation_id', $data->workSituations, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('work_situation_id'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Consulting Market</label>
                    {{ Form::select('requirement_id', $data->consultingMarkets, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Consulting Role</label>
                    {{ Form::select('requirement_id', array('L'=>'Large','M'=>'Medium'), 'm',['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Experience</label>
                    {{ Form::select('requirement_id', array('L'=>'Large','M'=>'Medium'), 'm',['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Expertise Area</label>
                    {{ Form::select('requirement_id', array('L'=>'Large','M'=>'Medium'), 'm',['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Modules</label>
                    {{ Form::select('requirement_id', array('L'=>'Large','M'=>'Medium'), 'm',['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Curriculum Vitae</label>
                    {{ Form::file('requirement_id', null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
            </div>

            <!-- starting list of projects -->
            <hr>
            <!-- starting list of educations -->
            <hr>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Rate Type</label>
                    {{ Form::select('requirement_id', array('L'=>'Large','M'=>'Medium'), 'm',['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Currency</label>
                    {{ Form::select('requirement_id', array('L'=>'Large','M'=>'Medium'), 'm',['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Rate</label>
                    {{ Form::text('requirement_id', null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Preferred Payment Method</label>
                    {{ Form::select('requirement_id', array('L'=>'Large','M'=>'Medium'), 'm',['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Preferred Payment Term</label>
                    {{ Form::select('requirement_id', array('L'=>'Large','M'=>'Medium'), 'm',['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Billing Cycle</label>
                    {{ Form::select('requirement_id', array('L'=>'Large','M'=>'Medium'), 'm',['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
            </div>

            <!-- start business informations -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Company Name (Self Employed fill with N/A)</label>
                    {{ Form::text('city', null, ['placeholder' => 'City', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Company registration number</label>
                    {{ Form::text('province', null, ['placeholder' => 'Province/State', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>TAX/VAT/GST registration number</label>
                    {{ Form::text('city', null, ['placeholder' => 'City', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Address</label>
                    {{ Form::text('province', null, ['placeholder' => 'Province/State', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Country</label>
                    {{ Form::select('requirement_id', $data->countries, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>City</label>
                    {{ Form::text('requirement_id', null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>State</label>
                    {{ Form::text('city', null, ['placeholder' => 'City', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Postal Code</label>
                    {{ Form::text('province', null, ['placeholder' => 'Province/State', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                </div>
            </div>
            <!-- terms and conditions -->
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
                    <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
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
