$(document).ready(function () {

    $('.btn-action-control').on('click', function () {
        var actionType = $(this).data('action');
        var actionId = $(this).data('id');
        switch (actionType) {
            case'invite_contractor_for_interview':
                $.post('/client/interview/request', {'actionId': actionId}, function (data) {
                    $('#client_interview_request').html(data);
                });
                $('#client_interview_request').modal();
                break;
            case'submit_feedback_interview_to_contractor':
                $.post('/client/interview/feedback', {'actionId': actionId}, function (data) {
                    $('#client_interview_feedback').html(data);
                });
                $('#client_interview_feedback').modal();
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

    $('.dropdown-toggle').dropdown();

    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy'
    });
});