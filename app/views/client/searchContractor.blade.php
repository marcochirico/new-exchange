@extends('master')

@section('content')
<h3 class="text-center">Search Contractors Available</h3>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        @include('client.adminNavbar')
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            {{ Form::open(array('action' => 'ClientController@searchContractors')) }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>First Name</label>
                    {{ Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Last Name</label>
                    {{ Form::text('last_name', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) }}
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Citizenship Country</label>
                    {{ Form::select('requirement_id', $data->countries, null,['class' => 'form-control']) }}
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Residence Country</label>
                    {{ Form::select('requirement_id', $data->countries, null,['class' => 'form-control']) }}
                </div>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>City</label>
                    {{ Form::text('city', null, ['placeholder' => 'City', 'class' => 'form-control']) }}
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Work Situation</label>
                    {{ Form::select('requirement_id', $data->countries, null,['class' => 'form-control']) }}
                </div>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Consulting Market</label>
                    {{ Form::select('requirement_id', $data->consultingMarkets, null,['class' => 'form-control']) }}
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Consulting Role</label>
                    {{ Form::select('requirement_id', array('L'=>'Large','M'=>'Medium'), 'm',['class' => 'form-control']) }}
                </div>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Experience</label>
                    {{ Form::select('requirement_id', array('L'=>'Large','M'=>'Medium'), 'm',['class' => 'form-control']) }}
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Expertise Area</label>
                    {{ Form::select('requirement_id', array('L'=>'Large','M'=>'Medium'), 'm',['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Modules</label>
                    {{ Form::select('requirement_id', array('L'=>'Large','M'=>'Medium'), 'm',['class' => 'form-control']) }}
                </div>
            </div>



            <div class="text-center">
                {{ Form::submit('Search contractors', ['class' => 'btn btn-primary']) }}
                {{ Form::button('View last search', ['class' => 'btn btn-primary']) }}
            </div>

            {{ Form::close() }}
        </div>

    </div>
</div>
@stop
