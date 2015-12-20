@extends('master')

@section('content')
<h3 class="text-center">Dashboard contractor</h3>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        @include('contractor.adminNavbar')
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body dashboard-counter">
                <span>{{$data->interviewStatus->interviewsReceived}}</span>
                <br />
                Interview Received
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body dashboard-counter">
                <span>{{$data->interviewStatus->interviewsReplaced}}</span>
                <br />
                Interview Replaced
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body dashboard-counter">
                <span style="">{{$data->interviewStatus->interviewsAccepted}}</span>
                <br />
                Interview Accepted
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body dashboard-counter">
                <span style="">{{$data->interviewStatus->interviewsRefused}}</span>
                <br />
                Interview Refused
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body dashboard-counter">
                <span style="">10</span>
                <br />
                Interview Feedback
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body dashboard-counter">
                <span style="">10</span>
                <br />
                Project Active
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body dashboard-counter">
                <span style="">10</span>
                <br />
                Project Closed
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body dashboard-counter">
                <span style="">10</span>
                <br />
                Project Applied
            </div>
        </div>
    </div>
</div>
@stop