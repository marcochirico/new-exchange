@extends('master')

@section('content')
<h3 class="text-center">Project Active</h3>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        @include('client.adminNavbar')
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <!-- panel - start -->
        <?php
        if (count($data->projects) > 0) :
            foreach ($data->projects as $project):
                ?>
                @include('client.partials.projectActiveRow')
                <?php
            endforeach;
        else :

            echo Utils\Helper::noResultsFound();

        endif;
        ?>
        <!-- panel - end -->

        <?php echo $data->projects->links(); ?>

    </div>
</div>
@stop