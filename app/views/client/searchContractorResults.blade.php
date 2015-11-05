@extends('master')

@section('content')
<h3 class="text-center">Search Contractors Available</h3>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        @include('client.adminNavbar')
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">

        <?php foreach ($data->searchResults as $result): ?>
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
                                        <td class="title">Contractor Name</td>
                                        <td><?php echo $result->first_name; ?></td>
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
        <?php endforeach; ?>
        <nav>
            <?php echo $data->searchResults->links(); ?>
        </nav>
    </div>
</div>
@stop