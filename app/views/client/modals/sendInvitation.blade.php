<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Interview Request</h4>
        </div>

        {{ Form::open(array('action' => 'ClientController@searchContractors', 'id'=>'form_interview_request')) }}
        <input type="hidden" name="client_id" value="{{$data->client_id}}" />
        <input type="hidden" name="contractor_id" value="{{$data->contractor_id}}" />
        <div class="modal-body">
            <div class="row outcome-message" style="display:none;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 message">

                </div>
            </div>
            <div class="row form">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Proposed date</label>
                        <input type="text" class="form-control datepicker" name="interview_request[proposed_date]" />
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Proposed time</label>
                        <select class="form-control" name="interview_request[proposed_time]">
                            <option value="00:00">00:00</option>
                            <option value="01:00">01:00</option>
                            <option value="02:00">02:00</option>
                            <option value="03:00">03:00</option>
                            <option value="04:00">04:00</option>
                            <option value="05:00">05:00</option>
                            <option value="06:00">06:00</option>
                            <option value="07:00">07:00</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                            <option value="21:00">21:00</option>
                            <option value="22:00">22:00</option>
                            <option value="23:00">23:00</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Timezone</label>
                        <select class="form-control" name="interview_request[timezone_id]">
                            <?php foreach ($data->timezones as $timezone): ?>
                                <option value="{{$timezone->timezone_id}}">{{$timezone->timezone}}</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Proposed location</label>
                        <input type="text" class="form-control" name="interview_request[proposed_location]" />
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Proposed rate</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="interview_request[proposed_rate]" />
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Job reference</label>
                        <input type="text" class="form-control" name="interview_request[job_reference]" />
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Job preview</label>
                        {{ Form::textarea('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control', 'name'=>'interview_request[job_preview]']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
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