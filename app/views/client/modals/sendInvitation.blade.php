<?php
$proposedDate = isset($data->interview['date']) ? $data->interview['date'] : '';
$timezoneId = isset($data->interview['timezone_id']) ? $data->interview['timezone_id'] : '';
$location = isset($data->interview['location']) ? $data->interview['location'] : '';
$rate = isset($data->interview['rate']) ? $data->interview['rate'] : '';
$reference = isset($data->interview['reference']) ? $data->interview['reference'] : '';
$preview = isset($data->interview['preview']) ? $data->interview['preview'] : '';
$interviewId = isset($data->interview['interview_id']) ? $data->interview['interview_id'] : '';

$date = $proposedDate != '' ? Utils\Helper::dateFromDb(date('Y-m-d', strtotime($proposedDate))) : '';
$time = $proposedDate != '' ? date('H:i', strtotime($proposedDate)) : '';

$disabled = '';
$change = '';
if ($data->interview['interview_id']) {
    $disabled = 'readonly';
    $change = 'Change';
}
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Interview Request <?php echo $change; ?></h4>
        </div>

        {{ Form::open(array('action' => 'ClientController@searchContractors', 'id'=>'form_interview_request')) }}
        <input type="hidden" name="client_id" value="{{$data->client_id}}" />
        <input type="hidden" name="contractor_id" value="{{$data->contractor_id}}" />
        <input type="hidden" name="interview_id" value="{{$interviewId}}" />
        <div class="modal-body">
            <div class="row outcome-message" style="display:none;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 message">
                    
                </div>
            </div>
            <div class="row form">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Proposed date</label>
                        <input type="text" class="form-control datepicker" name="interview_request[proposed_date]" value="{{$date}}" />
                        <span class="form_field_error"><?php echo $errors->first('first_name'); ?></span>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Proposed time</label>
                        <select class="form-control" name="interview_request[proposed_time]">
                            <?php
                            for ($i = 0; $i <= 23; $i++) :
                                $inc = str_pad($i, 2, 0, STR_PAD_LEFT);
                                $select = $time == $inc . ':00' ? 'selected' : '';
                                ?>
                                <option value="<?php echo $inc; ?>:00" <?php echo $select; ?>><?php echo $inc; ?>:00</option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Timezone</label>
                        <select class="form-control" name="interview_request[timezone_id]" <?php echo $disabled; ?> >
                            <?php
                            foreach ($data->timezones as $timezone):
                                $select = $timezoneId == $timezone->timezone_id ? 'selected' : '';
                                ?>
                                <option value="{{$timezone->timezone_id}}" <?php echo $select; ?>>{{$timezone->timezone}}</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Proposed location</label>
                        <input type="text" class="form-control" name="interview_request[proposed_location]" value="{{$location}}" <?php echo $disabled; ?> />
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Proposed rate</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="interview_request[proposed_rate]" value="{{$rate}}" <?php echo $disabled; ?> />
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Job reference</label>
                        <input type="text" class="form-control" name="interview_request[job_reference]" value="{{$reference}}" <?php echo $disabled; ?> />
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Job preview</label>
                        {{ Form::textarea('first_name', $preview, ['class' => 'form-control', 'name'=>'interview_request[job_preview]']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm btn-close-reload" data-dismiss="modal">Close</button>
            {{ Form::button('Send invitation', ['class' => 'btn btn-primary btn-sm submit_interview_request']) }}
        </div>
        {{ Form::close() }}
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<script>
    $('.submit_interview_request').on('click', function () {
        var params = $('#form_interview_request').serialize();
        $.post('/client/interview/request/save', params, function (data) {
            if (data) {
                var obj = jQuery.parseJSON(data);
                
                if (obj.error === true) {
                    $('.outcome-message .message').html(obj.html);
                    $('.outcome-message').fadeIn();
                } else {
                    $('.outcome-message .message').html(obj.html);
                    $('.form, .submit_interview_request').hide();
                    $('.outcome-message').fadeIn();
                }
            }
        });
    });
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy'
    });
</script>