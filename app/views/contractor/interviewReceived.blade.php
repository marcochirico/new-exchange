@extends('master')

@section('content')
<h3 class="text-center">Interviews Received</h3>

<div class="row panel_list">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        @include('contractor.adminNavbar')
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <!-- panel - start -->
        <?php
        if (count($data->interviews) > 0) :
            foreach ($data->interviews as $interview):
                ?>
                @include('contractor.partials.interviewReceivedRow')
                <?php
            endforeach;
        else :

            echo Utils\Helper::noResultsFound();

        endif;
        ?>
        <!-- panel - end -->

        <?php echo $data->interviews->links(); ?>

    </div>
</div>
@stop