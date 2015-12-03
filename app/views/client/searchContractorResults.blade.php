@extends('master')

@section('content')
<h3 class="text-center">Search Contractors Available</h3>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        @include('client.adminNavbar')
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

        <?php
        if (count($data->searchResults)):
            foreach ($data->searchResults as $result):
                ?>
                @include('client.partials.searchContractorResultRow')
                <?php
            endforeach;
        else:
            ?>
                No contractors found. <a href="/client/contractors/search">Back to search</a>
        <?php
        endif;
        ?>

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
                <h4 class="modal-title">Send Invitation</h4>
            </div>
            {{ Form::open(array('action' => 'ClientController@searchContractors')) }}
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Proposed date</label>
                            <input type="text" class="form-control datepicker" name="send_invitation[proposed_date]" />
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Proposed time</label>
                            <select class="form-control">
                                <option>00:00</option>
                                <option>01:00</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Timezone</label>
                            <select class="form-control">
                                <option>GTM + 1</option>
                                <option>GTM + 2</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Proposed location</label>
                            <input type="text" class="form-control" name="send_invitation[proposed_date]" />
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Proposed rate</label>
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-addon">.00</span>
                            </div>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Job reference</label>
                            <input type="text" class="form-control" name="send_invitation[proposed_date]" />
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Job preview</label>
                            {{ Form::textarea('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{ Form::submit('Send invitation', ['class' => 'btn btn-primary']) }}
            </div>
            {{ Form::close() }}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop