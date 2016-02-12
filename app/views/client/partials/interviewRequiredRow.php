<!-- panel - start -->
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table internal-block">
                    <thead>
                        <tr>
                            <th colspan="2" class="project-name">
                                <?php echo $interview->contractor->first_name.' '.$interview->contractor->last_name; ?>
                                <span class="label label-warning pull-right">Required</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="title">Location and Date</td>
                            <td><?php echo $interview->location.' on '.  Utils\Helper::dateTimeFromDb($interview->date); ?></td>
                        </tr>
                        <tr>
                            <td class="title">Rate</td>
                            <td><?php echo Utils\Helper::moneyFormat($interview->rate) . ' ' . $interview->currency['currency']; ?></td>
                        </tr>
                        <tr>
                            <td class="title">Reference</td>
                            <td><?php echo $interview->reference; ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-right">
                    <button type="button" class="btn btn-success btn-sm btn-action-control" data-action="revoke_invitation_to_interview" data-id="<?php echo $interview->interview_id; ?>">Revoke Invitation</button>
                </div>
                </div>
        </div>
    </div>
</div>
<!-- panel - end -->