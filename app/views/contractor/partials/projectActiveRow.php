<!-- panel - start -->
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table internal-block">
                    <thead>
                        <tr>
                            <th colspan="2" class="project-name">
                                <?php // echo $interview->contractor->first_name.' '.$interview->contractor->last_name; ?>
                                <span class="label label-success pull-right">Active</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="title">Location and Date</td>
                            <td><?php // echo $interview->location.' - '.$interview->date; ?></td>
                        </tr>
                        <tr>
                            <td class="title">Rate</td>
                            <td><?php // echo $interview->rate ?></td>
                        </tr>
                        <tr>
                            <td class="title">Reference</td>
                            <td><?php // echo $interview->reference; ?></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary btn-sm btn-action-response-interview" data-interview-id="<?php // echo $interview->interview_id; ?>" data-action="accept">Send Report</button>&nbsp;
                
            </div>
        </div>
    </div>
</div>
<!-- panel - end -->