$(document).ready(function () {

    $('.btn-action-control').on('click', function () {
        var actionType = $(this).data('action');
        var actionId = $(this).data('id');
        $('#modal-interview-invitation').modal();
        /*
         switch (actionType) {
         case 'invite_contractor_for_interview':
         window.location = '/client/contractor/action/invite/' + actionId;
         break;
         default:
         alert('no action identified.');
         break;
         }
         */
    });

    $('.btn-register').on('click', function () {
        var url = $(this).data('url');
        window.location = url;
    });

    $('.dropdown-toggle').dropdown();



});