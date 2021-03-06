@extends('master')

@section('content')
<h3 class="text-center text-static-title">Contact Us</h3>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php
        if (Session::has('contact_us_errors')):
            $errors = Session::get('contact_us_errors');
            
            ?>
            <div class="alert alert-danger" role="alert"><strong>Error!</strong> Please fill correctly all mandatory fileds.</div>
            <?php
        endif;
        ?>
        <div class="row">
            {{ Form::open(array('action' => 'StaticPageController@contactUsSend')) }}
            <div class="col-md-offset-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label>First Name</label>
                    {{ Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo isset($errors) ?  $errors->first('first_name'):''; ?></span>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label>Last Name</label>
                    {{ Form::text('last_name', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo isset($errors) ?  $errors->first('last_name'):''; ?></span>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label>Email</label>
                    {{ Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo isset($errors) ?  $errors->first('email'):''; ?></span>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label>Subject</label>
                    {{ Form::text('subject', null, ['placeholder' => 'Confirm Email', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo isset($errors) ?  $errors->first('subject'):''; ?></span>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label>Message</label>
                    {{ Form::textarea('message', null, ['placeholder' => 'Confirm Email', 'class' => 'form-control']) }}
                    <span class="form_field_error"><?php echo isset($errors) ?  $errors->first('message'):''; ?></span>
                </div>

                <div class="text-center">
                    {{ Form::submit('Send', ['class' => 'btn btn-primary btn-padding-long']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop