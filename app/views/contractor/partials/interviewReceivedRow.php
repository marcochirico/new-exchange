<!-- panel - start -->
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table internal-block">
                    <thead>
                        <tr>
                            <th colspan="2" class="project-name">
                                <?php echo $interview->client->company_name; ?>
                                <span class="label label-warning pull-right">Received on <?php echo Utils\Helper::dateTimeFromDb($interview->updated_at); ?></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width:30%;" class="title">Location and Date</td>
                            <td style="width:70%;">
                                <?php echo $interview->location.' on '.  Utils\Helper::dateTimeFromDb($interview->date); ?><br />
                                <small>Timezone: <?php echo $interview->timezone->timezone; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Rate</td>
                            <td>
                                <?php echo Utils\Helper::moneyFormat($interview->rate) . ' ' . $interview->currency['currency']; ?><br />
                                <small>Contractor currency: <?php echo $interview->contractor->currency->currency; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Reference</td>
                            <td><?php echo $interview->reference; ?></td>
                        </tr>
                        <tr>
                            <td class="title">Job Description</td>
                            <td><?php echo $interview->preview; ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-left">
                    <button type="button" class="btn btn-primary btn-sm btn-action-control" data-id="<?php echo $interview->interview_id; ?>" data-action="contractor_accept_interview">Accept</button>&nbsp;
                    <button type="button" class="btn btn-primary btn-sm btn-action-control" data-id="<?php echo $interview->interview_id; ?>" data-action="replace_contractor_for_interview">Replace</button>&nbsp;
                    <button type="button" class="btn btn-primary btn-sm btn-action-control" data-id="<?php echo $interview->interview_id; ?>" data-action="refuse">Refuse</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- panel - end -->