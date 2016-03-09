<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Send Interview Feedback</h4>
        </div>

        {{ Form::open(array('id'=>'form_interview_feedback')) }}
        <input type="hidden" name="interview_id" value="{{$data->interview_id}}" />
        <div class="modal-body">
            <div class="row outcome-message" style="display:none;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 message">

                </div>
            </div>
            <div class="row form">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Feedback</label>
                        <select class="form-control" name="interview_feedback[feedback_outcome]" id="feedback_status">
                            <option value="1">Positive</option>
                            <option value="0">Negative</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Project Date Start</label>
                        <input type="text" class="form-control datepicker positive" name="interview_feedback[project_start_date]" />
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Project Duration</label>
                        <input type="text" class="form-control datepicker positive" name="interview_feedback[project_duration]" />
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Rate</label>
                        <div class="input-group">
                            <input type="text" class="form-control positive" name="interview_feedback[project_rate]" />
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Payment Method</label>
                        {{ Form::select('interview_feedback[project_billing_method]', $data->paymentMethods, null,['class' => 'form-control positive']) }}
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Billing Cycle</label>
                        {{ Form::select('interview_feedback[project_billing_cycle]', $data->billingCycles, null,['class' => 'form-control positive']) }}
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Feedback Description</label>
                        {{ Form::textarea('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control', 'name'=>'interview_feedback[feedback_description]']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            {{ Form::button('Send feedback', ['class' => 'btn btn-primary submit_interview_feedback']) }}
        </div>
        {{ Form::close() }}
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<script>
    $('.submit_interview_feedback').on('click', function () {
        var params = $('#form_interview_feedback').serialize();
        $.post('/client/interview/feedback/save', params, function (data) {
            if (data) {
                var obj = jQuery.parseJSON(data);
                if (obj.error === true) {
                    $('.outcome-message .message').html(obj.html);
                    $('.outcome-message').fadeIn();
                } else {
                    $('.outcome-message .message').html(obj.html);
                    $('.form, .submit_interview_feedback').hide();
                    $('.outcome-message').fadeIn();
                }
            }
        });
        
        
    });
    $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
    $('#feedback_status').on('change', function () {
        var valSelect = $(this).val();
        if(valSelect == 0) {
            $('.positive').prop('disabled', true);;
        } else {
            $('.positive').prop('disabled', false);;
        }
    });
</script>