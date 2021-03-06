@extends('master')

@section('content')
<h3 class="text-center">Search Contractors Available</h3>

<div class="row panel_list">
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


@stop