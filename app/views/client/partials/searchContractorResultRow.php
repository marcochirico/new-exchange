<!-- panel - start -->
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table internal-block">
                    <thead>
                        <tr>
                            <th colspan="2" class="project-name">
                                <?php echo $result->first_name . ' ' . $result->last_name; ?>&nbsp;
                                <?php
                                if ($result->cv != ''):
                                    $cvFolderUrl = Config::get('attachment.documents.urls.cv');
                                    $url = $cvFolderUrl . '/' . $result->cv;
                                    ?>
                                    <a href="<?php echo $url; ?>" target="blank"><span class="glyphicon glyphicon-paperclip"></span></a>
                                <?php endif; ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="title" style="width:50%;">Country</td>
                            <td style="width:50%;"><?php echo $result->countryResidence['country'] . ' - ' . $result->countryResidence['code']; ?></td>
                        </tr>
                        <tr>
                            <td class="title">Rate</td>
                            <td><?php echo Utils\Helper::moneyFormat($result->rate) . ' ' . $result->currency['currency'] . ' - ' . $result->rateType['rate_type']; ?></td>
                        </tr>
                        <tr>
                            <td class="title">Work Situation</td>
                            <td><?php echo $result->workSituation['work_situation']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="collapse" id="toggleContent_<?php echo $result->contractor_id; ?>">
                    <!--<h5 class="text-center">More informations</h5>-->
                    <table class="table internal-block">
                        <tbody>
                            <tr>
                                <td class="title" style="width:50%;">Consulting Market</td>
                                <td style="width:50%;"><?php echo $result->consultingMarket['consulting_market']; ?></td>
                            </tr>
                            <tr>
                                <td class="title">Consulting Role</td>
                                <td><?php echo $result->consultingRole['consulting_role']; ?></td>
                            </tr>
                            <tr>
                                <td class="title">Experience Level</td>
                                <td><?php echo $result->experienceLevel['experience_level']; ?></td>
                            </tr>
                            <tr>
                                <td class="title">Expertise Area</td>
                                <td><?php echo $result->expertiseArea['expertise_area']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
                <a class="more-info-btn" type="button" data-toggle="collapse" data-target="#toggleContent_<?php echo $result->contractor_id; ?>" aria-expanded="false" aria-controls="collapseExample">More info</a>
                <br /><br />
                <div class="text-left">
                    
                    <button type="button" class="btn btn-primary btn-sm btn-action-control" data-action="invite_contractor_for_interview" data-id="<?php echo $result->contractor_id; ?>">Interview Request</button>
                </div>



            </div>
        </div>
    </div>
</div>
<!-- panel - end -->