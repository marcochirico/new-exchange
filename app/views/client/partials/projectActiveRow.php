<!-- panel - start -->
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table internal-block">
                    <thead>
                        <tr>
                            <th colspan="2" class="project-name">
                                Future World Software Development - Project
                                <span class="label label-success pull-right">Accepted</span>
                                <!--<span class="label pull-right">&nbsp;</span>-->
                                <!--<span class="label label-warning pull-right">Waiting for feedback</span>-->
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="title">Contractor Name</td>
                            <td><?php // echo $interview->first_name;       ?></td>
                        </tr>
                        <tr>
                            <td class="title">Reference</td>
                            <td>Mario Rossi</td>
                        </tr>
                    </tbody>
                </table>
                
                <button type = "button" class = "btn btn-primary btn-sm btn-action-control" data-action = "submit_feedback_interview_to_contractor" data-id = "<?php echo $project->project_id; ?>">Timesheet</button>
                <button type = "button" class = "btn btn-primary btn-sm btn-action-control" data-action = "submit_feedback_interview_to_contractor" data-id = "<?php echo $project->project_id; ?>">Sent Report</button>
            </div>
        </div>
    </div>
</div>
<!--panel - end -->