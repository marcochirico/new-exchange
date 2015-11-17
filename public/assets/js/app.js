$(document).ready(function () {

    $('.btn-action-control').on('click', function () {
        var actionType = $(this).data('action');
        var actionId = $(this).data('id');
        switch (actionType) {
            case 'invite_contractor_for_interview':
                window.location = '/client/contractor/action/invite/' + actionId;
                break;
            default:
                alert('no action identified.');
                break;
        }
    });
});