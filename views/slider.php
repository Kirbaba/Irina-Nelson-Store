<style>
    /**
     * Demo styles
     * Only for example purposes
     * Remove in production
     */

    /* Bad and ugly reset */
    *{ margin: 0; padding: 0; border: 0; }

    .box-top {
        width: 100%;
        height: 100%;
    }
</style>
<div class="slider-top">
    <ul class="slides-top">
        <li class="slide-top"><div class="box-top" style="background-color: #1abc9c;"><img src="<?php bloginfo('template_directory'); ?>/img/slide.png" alt=""></div></li>
        <li class="slide-top"><div class="box-top" style="background-color: #16a085;"><img src="<?php bloginfo('template_directory'); ?>/img/slide.png" alt=""></div></li>
        <li class="slide-top"><div class="box-top" style="background-color: #f1c40f;"><img src="<?php bloginfo('template_directory'); ?>/img/slide.png" alt=""></div></li>
        <li class="slide-top"><div class="box-top" style="background-color: #f39c12;"><img src="<?php bloginfo('template_directory'); ?>/img/slide.png" alt=""></div></li>
        <li class="slide-top"><div class="box-top" style="background-color: #d35400;"><img src="<?php bloginfo('template_directory'); ?>/img/slide.png" alt=""></div></li>
        <li class="slide-top"><div class="box-top" style="background-color: #c0392b;"><img src="<?php bloginfo('template_directory'); ?>/img/slide.png" alt=""></div></li>
    </ul>
</div>

<script type="text/javascript">


    /*$(window).on('keyup', function (key) {
        if (key.keyCode === 13) {
            glide.jump(3, console.log('Wooo!'));
        };
    });

    $('.slider-arrow').on('click', function() {
        console.log(glide.current());
    });*/
</script>