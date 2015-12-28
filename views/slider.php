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
        <?php foreach($slids as $s) { ?>
            <li class="slide-top">
                <div class="box-top" >
                    <img src="<?= $s['link'] ?>" alt="">
                    <?= $s['text'] ?>
                </div>
            </li>
        <?php } ?>
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