<?php foreach($posts as $p) {?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <a href="<?php echo get_the_permalink($p->ID);  ?>">
        <div class="stock__item">
            <?php echo get_the_post_thumbnail($p->ID,'full') ?>
        </div>
    </a>
</div>
<?php } ?>