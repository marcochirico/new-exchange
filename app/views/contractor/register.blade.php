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
                    {{ Form::text('linkedin', null, ['placeholder' => 'Zip/Postal Code', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('linkedin'); ?></span>
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
                    {{ Form::select('consulting_market_id', $data->consultingMarkets, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('consulting_market_id'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Consulting Role</label>
                    {{ Form::select('consulting_role_id', $data->consultingRoles, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('consulting_role_id'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Experience</label>
                    {{ Form::select('experience_level_id', $data->experienceLevels, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('experience_level_id'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Expertise Area</label>
                    {{ Form::select('expertise_area_id', $data->expertiseAreas, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('expertise_area_id'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Modules</label>
                    {{ Form::select('module_id', $data->modules, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('module_id'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Curriculum Vitae</label>
                    {{ Form::file('cv_document', null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('cv_document'); ?></span>
                </div>
            </div>

            <!-- starting list of projects -->
            <hr>
            <!-- starting list of educations -->
            <hr>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Rate Type</label>
                    {{ Form::select('rate_type_id', $data->rateTypes, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('rate_type_id'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Currency</label>
                    {{ Form::select('currency_id', $data->currencies, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('currency_id'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Rate</label>
                    {{ Form::text('rate', null,['placeholder' => 'Rate','class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('rate'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Preferred Payment Method</label>
                    {{ Form::select('payment_method_id', $data->paymentMethods, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('payment_method_id'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Preferred Payment Term</label>
                    {{ Form::select('payment_term_id', $data->paymentTerms, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('payment_term_id'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Billing Cycle</label>
                    {{ Form::select('billing_cycle_id', $data->billingCycles, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('billing_cycle_id'); ?></span>
                </div>
            </div>

            <!-- start business informations -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Company name (Self Employed fill with N/A)</label>
                    {{ Form::text('business_name', null, ['placeholder' => 'Company name', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('business_name'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Company registration number</label>
                    {{ Form::text('business_registration_number', null, ['placeholder' => 'Company registration number', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('business_registration_number'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>TAX/VAT/GST registration number</label>
                    {{ Form::text('business_tax_number', null, ['placeholder' => 'TAX/VAT/GST registration number', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('business_tax_number'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Address</label>
                    {{ Form::text('business_address', null, ['placeholder' => 'Address', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('business_address'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Country</label>
                    {{ Form::select('business_country_id', $data->countries, null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('business_country_id'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>City</label>
                    {{ Form::text('business_city', null,['class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('business_city'); ?></span>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Province/State</label>
                    {{ Form::text('business_province', null, ['placeholder' => 'Province/State', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('business_province'); ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Postal Code</label>
                    {{ Form::text('business_postal_code', null, ['placeholder' => 'Zip Code', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo $errors->first('business_postal_code'); ?></span>
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
                    <span class="form_field_error"><?php echo $errors->first('terms'); ?></span>
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
