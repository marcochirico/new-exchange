@extends('master')

@section('content')
<h3 class="text-center">Interviews {{$data->title}}</h3>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        @include('client.adminNavbar')
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <!-- panel - start -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <table class="table internal-block">
                            <thead>
                                <tr>
                                    <th colspan="2" class="project-name">Future World Software Development</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="title">Company name</td>
                                    <td>Microtech Engineering Srl</td>
                                </tr>
                                <tr>
                                    <td class="title">Reference</td>
                                    <td>Mario Rossi</td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary btn-sm">Fill Timesheet</button>&nbsp;
                        <button type="button" class="btn btn-primary btn-sm">Send Report</button>&nbsp;
                        <button type="button" class="btn btn-primary btn-sm">Close Project</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- panel - end -->

        <!-- panel - start -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <table class="table internal-block">
                            <thead>
                                <tr>
                                    <th colspan="2" class="project-name">Future World Software Development</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="title">Company name</td>
                                    <td>Microtech Engineering Srl</td>
                                </tr>
                                <tr>
                                    <td class="title">Reference</td>
                                    <td>Mario Rossi</td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary btn-sm">Fill Timesheet</button>&nbsp;
                        <button type="button" class="btn btn-primary btn-sm">Send Report</button>&nbsp;
                        <button type="button" class="btn btn-primary btn-sm">Close Project</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- panel - end -->

        <!-- panel - start -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <table class="table internal-block">
                            <thead>
                                <tr>
                                    <th colspan="2" class="project-name">Future World Software Development</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="title">Company name</td>
                                    <td>Microtech Engineering Srl</td>
                                </tr>
                                <tr>
                                    <td class="title">Reference</td>
                                    <td>Mario Rossi</td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary btn-sm">Fill Timesheet</button>&nbsp;
                        <button type="button" class="btn btn-primary btn-sm">Send Report</button>&nbsp;
                        <button type="button" class="btn btn-primary btn-sm">Close Project</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- panel - end -->

        <!-- panel - start -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <table class="table internal-block">
                            <thead>
                                <tr>
                                    <th colspan="2" class="project-name">Future World Software Development</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="title">Company name</td>
                                    <td>Microtech Engineering Srl</td>
                                </tr>
                                <tr>
                                    <td class="title">Reference</td>
                                    <td>Mario Rossi</td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary btn-sm">Fill Timesheet</button>&nbsp;
                        <button type="button" class="btn btn-primary btn-sm">Send Report</button>&nbsp;
                        <button type="button" class="btn btn-primary btn-sm">Close Project</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- panel - end -->
        <nav>
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@stop