@extends('master')

@section('content')
<h3 class="text-center">Search Contractors Available</h3>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        @include('client.adminNavbar')
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

        <?php foreach ($data->searchResults as $result): ?>
            @include('client.partials.searchContractorResultRow')
        <?php endforeach; ?>

        <nav>
            <?php echo $data->searchResults->links(); ?>
        </nav>
    </div>
</div>

<div class="modal fade" id="modal-interview-invitation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop