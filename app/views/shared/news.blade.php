<h4 class="title-bar news navbar"><i class="glyphicon glyphicon-file"></i>News List</h4>
<div class="row">
    <?php
    $news = Model\News::all();
    if (count($news) > 0):
        $i = 1;
        foreach ($news as $n):
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 news-box">
                <div class="content">
                    <?php echo $n->excerpt; ?>
                </div>
                <a href="<?php echo $n->link; ?>" target="_blank">Read more &nbsp;<span class=" glyphicon glyphicon-circle-arrow-right"></span></a>
            </div>
            <?php
            if ($i == 4):
                ?>
            </div><div class="row">
                <?php
                $i = 0;
            endif;
            $i++;
        endforeach;
    endif;
    ?>
</div>