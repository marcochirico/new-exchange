@extends('master')

@section('content')

<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <?php
        $i = 0;
        foreach ($data->dashboard as $key => $consultingMarket):
            ?>
            <li role="presentation" class="<?php echo $i == 0 ? 'active' : ''; ?>">
                <a href="#tab<?php echo strtolower($key); ?>" aria-controls="tab<?php echo strtolower($key); ?>" role="tab" data-toggle="tab"><?php echo $key; ?></a>
            </li>
            <?php
            $i++;
        endforeach;
        ?>


    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <?php
        $n = 0;
        foreach ($data->dashboard as $key => $consultingMarket):
            ?>

            <div role="tabpanel" class="tab-pane<?php echo $n == 0 ? ' active' : ''; ?>" id="tab<?php echo strtolower($key); ?>">
                <br />
                <div class="row">

                    <?php foreach ($consultingMarket as $consultingRoles => $currencies): ?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><?php echo $consultingRoles; ?></div>
                                <div class="panel-body">
                                    <table class="table table-condensed table-striped">
                                        <?php foreach ($currencies as $currency => $rate): ?>
                                            <tr>
                                                <td><?php echo Utils\Helper::moneyFormat($rate); ?></td>
                                                <td><?php echo $currency; ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <?php
            $n++;
        endforeach;
        ?>
    </div>
</div>

@stop


