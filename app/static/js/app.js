$(document).ready(function () {

    $('.dashboard-box-link').on('click', function () {
        var url = $(this).data('url');
        window.location = url;
    });

    //actions with confirm box
    $('.btn-action-control.confirm').on('click', function () {
        var actionType = $(this).data('action');
        var actionId = $(this).data('id');
        bootbox.confirm("Are you sure?", function (result) {
            if (result) {
                switch (actionType) {
                    case'replace_contractor_for_interview':
                        $.post('/contractor/ajax/interview/received/replace', {'actionId': actionId}, function (data) {
                            $('#client_interview_request').html(data);
                        });
                        $('#client_interview_request').modal();
                        break;
                    case'replace_client_for_interview':
                        $.post('/client/interview/request/replace', {'actionId': actionId}, function (data) {
                            $('#client_interview_request').html(data);
                        });
                        $('#client_interview_request').modal();
                        break;
                    case'replace_client_for_interview':
                        $.post('/client/interview/request/replace', {'actionId': actionId}, function (data) {
                            $('#client_interview_request').html(data);
                        });
                        $('#client_interview_request').modal();
                        break;
                    case'contractor_accept_interview':
                        $('#confirm_modal').modal();
                        $.post('/contractor/ajax/interview/received/accept', {'actionId': actionId}, function (data) {
                            location.reload();
                        });
                        break;
                    case'contractor_refuse_interview':
                        $('#confirm_modal').modal();

                        $.post('/contractor/ajax/interview/received/refuse', {'actionId': actionId}, function (data) {
                            location.reload();
                        });
                        break;
                    case'project_confirm':
                        $.post('/contractor/ajax/interview/feedback/confirm', {'actionId': actionId}, function (data) {
                            location.reload();
                        });
                        break;
                    case'project_refuse':
                        $.post('/contractor/ajax/interview/feedback/refuse', {'actionId': actionId}, function (data) {
                            location.reload();
                        });
                        break;

                }
            }
        });
    });

    //actions without confirm box
    $('.btn-action-control').on('click', function () {
        var actionType = $(this).data('action');
        var actionId = $(this).data('id');
        switch (actionType) {
            case'client_ContractorInterviewRequest':
                $.post('/client/interview/request', {'actionId': actionId}, function (data) {
                    $('#client_interview_request').html(data);
                });
                $('#client_interview_request').modal();
                break;
            case'client_ContractorInterviewFeedback':
                $.post('/client/interview/feedback', {'actionId': actionId}, function (data) {
                    $('#client_interview_feedback').html(data);
                });
                $('#client_interview_feedback').modal();
                break;
            case'project_fill_timesheet':
                $.post('/contractor/ajax/project/timesheet', {'actionId': actionId}, function (data) {
                    $('#project_fill_timesheet').html(data);
                });
                $('#project_fill_timesheet').modal();
                break;
        }
    });


    $('.btn-action-response-interview').on('click', function () {
        var actionResponse = $(this).data('action');
        var actionId = $(this).data('interview-id');

        //ajax call to update status
        $.post('/contractor/ajax/interview/received/' + actionResponse, {'actionId': actionId}, function (data) {
            location.reload();
        });
    });


    $('.btn-register').on('click', function () {
        var url = $(this).data('url');
        window.location = url;
    });

    //alert js
    $('.revoke_interview_client').on('click', function () {
        var interview_id = $(this).data('id');
        bootbox.confirm("Are you sure?", function (result) {
            if (result) {
                //ajax call to update status
                $.post('/client/ajax/interview/revoke', {'interview_id': interview_id}, function (data) {
                    location.reload();
                });
            }
        });
    });





    $('.dropdown-toggle').dropdown();

    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy'
    });
});