<?php if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>
    <div class="reviews__item">
        <p>«<?php echo get_the_content()?>».</p>
        <p class="author"><?php echo get_the_title() ?>, <?php echo get_post_meta($my_query->post->ID, 'years', 1) ?>.</p>
    </div>
<?
endwhile;
}
wp_reset_query(); ?>