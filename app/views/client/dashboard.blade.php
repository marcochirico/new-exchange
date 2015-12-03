@extends('master')

@section('content')
<h3 class="text-center">Dashboard client</h3>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        @include('client.adminNavbar')
    </div>
    
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body dashboard-counter">
                    <span>21</span>
                    <br />
                    Interview Required
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body dashboard-counter">
                    <span>3</span>
                    <br />
                    Interview Replaced
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body dashboard-counter">
                    <span style="">4</span>
                    <br />
                    Interview Accepted
                </div>
            </div>
        </div>
 
</div>
@stop