<section class="blog">
    <a id="go_blog" name="go_blog" class="go"></a>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    <div class="responsive">
                        <?php foreach($posts as $p){ ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="slide-date"><p><?php $date = date_create($p->post_date);
                                    echo date_format($date, 'Y-m-d'); ?></p></div>
                            <div class="slide-image"><?= get_the_post_thumbnail( $p->ID, 'full', [] ); ?></div>
                            <div class="slide-text">
                                <h4><a class="blogSliderLink" href="<?= $p->guid ?>"><?= $p->post_title ?></a></h4>
                                <p><?php content(50); ?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>