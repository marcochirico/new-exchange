$(document).ready(function () {

    $('.btn-action-control').on('click', function () {
        var actionType = $(this).data('action');
        var actionId = $(this).data('id');
        $.post('/client/interview/request', {'actionId': actionId}, function (data) {
            $('#client_interview_request').html(data);
        });
        $('#client_interview_request').modal();
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