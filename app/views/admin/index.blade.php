@extends('admin.master')
@section('content')
@include('admin.shared.navbar')
<div class="container">

    <h3 class="text-center">Dashboard</h3>
    <br />
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="panel panel-default dashboard-box-link" data-url="/contractor/interviews/received">
                <div class="panel-body dashboard-counter">
                    <span><?php echo $data->countContractors; ?></span>
                    <br />
                    Count Contractors
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="panel panel-default dashboard-box-link" data-url="/contractor/interviews/replaced">
                <div class="panel-body dashboard-counter">
                    <span><?php echo $data->countClients; ?></span>
                    <br />
                    Count Clients
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="panel panel-default dashboard-box-link" data-url="/contractor/interviews/accepted">
                <div class="panel-body dashboard-counter">
                    <span style=""><?php echo $data->countInterviews; ?></span>
                    <br />
                    Count Interviews
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="panel panel-default dashboard-box-link" data-url="/contractor/interviews/refused">
                <div class="panel-body dashboard-counter">
                    <span style=""><?php echo $data->countProjects; ?></span>
                    <br />
                    Count Projects
                </div>
            </div>
        </div>
</div> <!-- /container -->
@stop