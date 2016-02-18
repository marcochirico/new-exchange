<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Project Timesheet</h4>
        </div>

        {{ Form::open(array('action' => 'ClientController@searchContractors', 'id'=>'form_interview_request')) }}
        <input type="hidden" name="project_id" value="{{$data->project_id}}" />
        <div class="modal-body">

            <div class="row outcome-message" style="display:none;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 message">

                </div>
            </div>
            <div class="row timesheet_records">

            </div>
            <div class="timesheet_records_master" style="display:none;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input type="text" name="timesheet[date]" class="datepicker form-control input-sm" placeholder="Date" />
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input type="text" name="timesheet[hours]" class="form-control input-sm" placeholder="Hours" />
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a class=" btn btn-default btn-sm" id="">Remove</a>
                    </div>
                </div>
                <br /><br />
            </div>
            <br />
            <a class="addRow btn btn-default btn-sm" id="addRow">Add Row</a>
        </div><!-- /.modal-content -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            {{ Form::button('Save Report', ['class' => 'btn btn-primary btn-sm submit_interview_request']) }}
        </div>
        {{ Form::close() }}
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

        $('.addRow').on('click', function () {
            var htmlRow = $('.timesheet_records_master').html();
            $('.timesheet_records').append(htmlRow);
        });

        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
    </script>