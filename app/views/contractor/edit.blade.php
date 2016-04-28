@extends('master')

@section('content')
<h3 class="text-center">Edit Profile</h3>

<div class="row panel_list">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        @include('contractor.adminNavbar')
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?php
        if (Session::has('contractor_update_errors')):
            $errors = Session::get('contractor_update_errors');
            ?>
            <div class="alert alert-danger" role="alert"><strong>Error!</strong> Please fill correctly all mandatory fileds.</div>
            <?php
        endif;
        if (Session::has('contractor_update_confirm')):
            ?>
            <div class="alert alert-success" role="alert"><strong>Done!</strong> your profile has been correctly updated.</div>
            <?php
        endif;
        ?>
        {{ Form::open(array('action' => 'ContractorController@update', 'enctype' => 'multipart/form-data')) }}
        <input type="hidden" name="contractor_id" value="{{$data->details->contractor_id}}" />
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>First Name</label>
                {{ Form::text('first_name', $data->details->first_name, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Middle Name</label>
                {{ Form::text('middle_name', $data->details->middle_name, ['placeholder' => 'Middle Name', 'class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('middle_name'); ?></span>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Last Name</label>
                {{ Form::text('last_name', $data->details->last_name, ['placeholder' => 'Last Name', 'class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('last_name'); ?></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Address</label>
                {{ Form::text('address', $data->details->address, ['placeholder' => 'Address', 'class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('address'); ?></span>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Citizenship Country</label>
                {{ Form::select('citizenship_country_id', $data->countries, $data->details->citizenship_country_id,['class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('citizenship_country_id'); ?></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Residence Country</label>
                {{ Form::select('residence_country_id', $data->countries, $data->details->residence_country_id,['class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('residence_country_id'); ?></span>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>City</label>
                {{ Form::text('city', $data->details->city, ['placeholder' => 'City', 'class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('city'); ?></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Province/State</label>
                {{ Form::text('province', $data->details->province, ['placeholder' => 'Province/State', 'class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('province'); ?></span>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Zip/Postal Code</label>
                {{ Form::text('postal_code', $data->details->postal_code, ['placeholder' => 'Zip/Postal Code', 'class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('postal_code'); ?></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Linkedin Profile</label>
                {{ Form::text('linkedin', $data->details->linkedin, ['placeholder' => 'Zip/Postal Code', 'class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('linkedin'); ?></span>
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
                <label>Work Situation</label>
                {{ Form::select('work_situation_id', $data->workSituations, $data->details->work_situation_id,['class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('work_situation_id'); ?></span>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Consulting Market</label>
                {{ Form::select('consulting_market_id', $data->consultingMarkets, $data->details->consulting_market_id,['class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('consulting_market_id'); ?></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Consulting Role</label>
                {{ Form::select('consulting_role_id', $data->consultingRoles, $data->details->consulting_market_id,['class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('consulting_role_id'); ?></span>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Experience</label>
                {{ Form::select('experience_level_id', $data->experienceLevels, $data->details->experience_level_id,['class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('experience_level_id'); ?></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Expertise Area</label>
                {{ Form::select('expertise_area_id', $data->expertiseAreas, $data->details->expertise_area_id,['class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('expertise_area_id'); ?></span>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Modules</label>
                {{ Form::select('module_id', $data->modules, $data->details->module_id,['class' => 'form-control']) }}
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
                {{ Form::select('rate_type_id', $data->rateTypes, $data->details->rate_type_id,['class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('rate_type_id'); ?></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Currency</label>
                {{ Form::select('currency_id', $data->currencies, $data->details->currency_id,['class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('currency_id'); ?></span>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Rate</label>
                {{ Form::text('rate', $data->details->rate,['placeholder' => 'Rate','class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('rate'); ?></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Preferred Payment Method</label>
                {{ Form::select('payment_method_id', $data->paymentMethods, $data->details->payment_method_id,['class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('payment_method_id'); ?></span>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Preferred Payment Term</label>
                {{ Form::select('payment_term_id', $data->paymentTerms, $data->details->payment_term_id,['class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('payment_term_id'); ?></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Billing Cycle</label>
                {{ Form::select('billing_cycle_id', $data->billingCycles, $data->details->billing_cycle_id,['class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('billing_cycle_id'); ?></span>
            </div>
        </div>

        <!-- start business informations -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Company name (Self Employed fill with N/A)</label>
                {{ Form::text('business_name', $data->details->billing_cycle_id, ['placeholder' => 'Company name', 'class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('business_name'); ?></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Company registration number</label>
                {{ Form::text('business_registration_number', $data->details->billing_cycle_id, ['placeholder' => 'Company registration number', 'class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('business_registration_number'); ?></span>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>TAX/VAT/GST registration number</label>
                {{ Form::text('business_tax_number', $data->details->business_tax_number, ['placeholder' => 'TAX/VAT/GST registration number', 'class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('business_tax_number'); ?></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Address</label>
                {{ Form::text('business_address', $data->details->business_address, ['placeholder' => 'Address', 'class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('business_address'); ?></span>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Country</label>
                {{ Form::select('business_country_id', $data->countries, $data->details->business_country_id,['class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('business_country_id'); ?></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>City</label>
                {{ Form::text('business_city', $data->details->business_city,['class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('business_city'); ?></span>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Province/State</label>
                {{ Form::text('business_province', $data->details->business_province, ['placeholder' => 'Province/State', 'class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('business_province'); ?></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Postal Code</label>
                {{ Form::text('business_postal_code', $data->details->business_postal_code, ['placeholder' => 'Zip Code', 'class' => 'form-control']) }}
                <span class="form_field_error"><?php echo $errors->first('business_postal_code'); ?></span>
            </div>
        </div>
        <div class="text-center">
            {{ Form::submit('Save', ['class' => 'btn btn-primary btn-padding-long']) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop