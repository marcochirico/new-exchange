<!-- panel - start -->
<?php 
//echo '<pre>';
//print_r($project->contractor->timezone);die;
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table internal-block">
                    <thead>
                        <tr>
                            <th colspan="2" class="project-name">
                                <?php echo $project->client['company_name']; ?>
                                <span class="label label-success pull-right">Activated on <?php echo Utils\Helper::dateTimeFromDb($project->created_at); ?></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width:30%;" class="title">Start Date</td>
                            <td style="width:70%;">
                                <?php echo Utils\Helper::dateFromDb($project['date_start']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Duration</td>
                            <td>
                                <?php echo $project->days; ?><br />
                                <small>Unit: day(s)</small>
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Rate</td>
                            <td>
                                <?php echo Utils\Helper::moneyFormat($project['rate']) . ' ' . $project->contractor->currency['currency']; ?><br />
                                <small>Contractor currency: <?php echo $project->contractor->currency['currency']; ?></small>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-left">
                    <button type = "button" class = "btn btn-primary btn-sm btn-action-control" data-action = "project_fill_timesheet" data-id = "<?php echo $project->project_id; ?>">Timesheet</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- panel - end -->