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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    More lines
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    More lines
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    More lines
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    More lines
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