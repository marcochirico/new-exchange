<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Project Timesheet</h4>
        </div>

        {{ Form::open(array('action' => 'ClientController@searchContractors', 'id'=>'form_save_timesheet')) }}
        <input type="hidden" name="project_id" value="{{$data->projectId}}" />
        <div class="modal-body">

            <div class="row outcome-message" style="display:none;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 message">

                </div>
            </div>
            <div class="row timesheet_records">
                <?php
                foreach ($data->projectTimesheet as $timesheet) :
                    ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <input type="text" name="timesheet[date][]" class="datepicker_single form-control input-sm" placeholder="Date" value="{{Utils\Helper::dateFromDb($timesheet->date)}}" />
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <input type="text" name="timesheet[hours][]" class="form-control input-sm" placeholder="Hours" value="{{$timesheet->hours}}" />
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <a class=" btn btn-default btn-sm removeRow" >Remove</a>
                        </div>
                    </div>
                    <br /><br />
                    <?php
                endforeach;
                ?>
            </div>
            <div class="timesheet_records_master" style="display:none;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input type="text" name="timesheet[date][]" class="datepicker_single form-control input-sm" placeholder="Date" />
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input type="text" name="timesheet[hours][]" class="form-control input-sm" placeholder="Hours" />
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <a class=" btn btn-default btn-sm removeRow">Remove</a>
                    </div>
                </div>
                <script>
                    $('.datepicker_single').datepicker({
                        format: 'dd/mm/yyyy'
                    });
                </script>
                <br /><br />
            </div>
            <br />
            <a class="addRow btn btn-default btn-sm" id="addRow">Add Row</a>
        </div><!-- /.modal-content -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-sm project_save_timesheet" data-id="<?php echo $data->projectId; ?>">Save Report</button>
        </div>
        {{ Form::close() }}
    </div><!-- /.modal-dialog -->
    <script>
        $('.project_save_timesheet').on('click', function () {

            var params = $('#form_save_timesheet').serialize();


            $.post('/contractor/ajax/project/timesheet/save', params, function (data) {

                if (data) {
                    var obj = jQuery.parseJSON(data);
                    if (obj.error === true) {
                        $('.outcome-message .message').html(obj.html);
                        $('.outcome-message').fadeIn();
                    } else {
                        $('.outcome-message .message').html(obj.html);
                        $('.outcome-message').fadeIn();
                    }
                }

            });

        });

        $('.addRow').on('click', function () {
            var htmlRow = $('.timesheet_records_master').html();
            $('.timesheet_records').append(htmlRow);
        });
        
        $('.removeRow').on('click', function () {
            $(this).remove();
        });

        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
    </script>