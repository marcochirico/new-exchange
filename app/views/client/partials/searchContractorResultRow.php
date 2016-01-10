<!-- panel - start -->
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table internal-block">
                    <thead>
                        <tr>
                            <th colspan="2" class="project-name"><?php echo $result->first_name . ' ' . $result->last_name; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="title">Country</td>
                            <td>United States</td>
                        </tr>
                        <tr>
                            <td class="title">Currency</td>
                            <td><?php echo $result->currency['currency']; ?></td>
                        </tr>
                        <tr>
                            <td class="title">Rate</td>
                            <td><?php echo $result->rate; ?></td>
                        </tr>
                        <tr>
                            <td class="title">Rate Type</td>
                            <td><?php echo $result->rateType['rate_type']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary btn-sm btn-action-control" data-action="invite_contractor_for_interview" data-id="<?php echo $result->contractor_id; ?>">Send Invitation</button>
            </div>
        </div>
    </div>
</div>
<!-- panel - end -->