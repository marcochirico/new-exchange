@extends('master')

@section('content')
<h3 class="text-center">Dashboard contractor</h3>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        @include('contractor.adminNavbar')
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default dashboard-box-link" data-url="/contractor/interviews/received">
            <div class="panel-body dashboard-counter">
                <span>{{$data->interviewStatus->interviewsReceived}}</span>
                <br />
                Interviews Received
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default dashboard-box-link" data-url="/contractor/interviews/replaced">
            <div class="panel-body dashboard-counter">
                <span>{{$data->interviewStatus->interviewsReplaced}}</span>
                <br />
                Interviews Replaced
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default dashboard-box-link" data-url="/contractor/interviews/accepted">
            <div class="panel-body dashboard-counter">
                <span style="">{{$data->interviewStatus->interviewsAccepted}}</span>
                <br />
                Interviews Accepted
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default dashboard-box-link" data-url="/contractor/interviews/refused">
            <div class="panel-body dashboard-counter">
                <span style="">{{$data->interviewStatus->interviewsRefused}}</span>
                <br />
                Interviews Refused
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default dashboard-box-link" data-url="/contractor/interviews/feedback">
            <div class="panel-body dashboard-counter">
                <span style="">{{$data->interviewStatus->interviewsFeedback}}</span>
                <br />
                Interviews Feedback
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default dashboard-box-link" data-url="/contractor/projects/active">
            <div class="panel-body dashboard-counter">
                <span style="">{{$data->projectStatus->projectsActive}}</span>
                <br />
                Projects Active
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default dashboard-box-link" data-url="/contractor/projects/closed">
            <div class="panel-body dashboard-counter">
                <span style="">{{$data->projectStatus->projectsClosed}}</span>
                <br />
                Projects Closed
            </div>
        </div>
    </div>
    <!--    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body dashboard-counter">
                    <span style="">{{$data->jobStatus->jobsApplied}}</span>
                    <br />
                    Job Positions Applied
                </div>
            </div>
        </div>-->
</div>
@stop