/*-------------GOOGLE MAPS-----------------*/

/*function initialize() {

 var myLatlng = new google.maps.LatLng(59.934602, 30.334607);
 var mapOptions = {
 center: new google.maps.LatLng(59.934602, 30.334607),
 zoom: 17,
 mapTypeId: google.maps.MapTypeId.ROADMAP,
 scrollwheel: false
 };
 var map = new google.maps.Map(document.getElementById("map_canvas"),
 mapOptions);
 var marker = new google.maps.Marker({
 position: myLatlng,
 map: map,
 title:"Ditlogistic"
 });
 }

 function loadScript() {
 var script = document.createElement("script");
 script.type = "text/javascript";
 script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyAaOWKyamSxMTXclSDFmJ2N4Am20PCTD6I&sensor=FALSE&callback=initialize";
 document.body.appendChild(script);
 }

 window.onload = loadScript;
 */

function initSliderArtCraft(){
    var widthWrap = $('.wrap').width();
    var widthContainer = $('.container').width();
    var distance = (widthWrap - widthContainer) / 2;
    $('.slider-arrow--left').css({'left':distance});
    $('.slider-arrow--right').css({'right':distance});
    console.log(widthWrap);
    console.log(widthContainer);
}

$(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() != 0) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $('#toTop').click(function () {
        $('body,html').animate({scrollTop: 0}, 1000);
    });

    $('.smoothScroll').click(function (event) {
        event.preventDefault();
        var href = $(this).attr('href');
        var target = $(href);
        var top = target.offset().top;
        $('html,body').animate({
            scrollTop: top
        }, 1000);
    });
});
$(function () {

    $('.responsive').slick({
        dots: false,
        infinite: false,
        autoplay: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

});

jQuery(document).ready(function($) {
    var id;
    var glide = $('.slider-top').glide().data('api_glide');


    $(document).on('click', '.buy-but', function(){
        id = $(this).attr('data-item');
        return false;
    });

    $(document).on('click', '.send-order', function(){
        var name = $('input[name="order-name"]').val();
        var mail = $('input[name="order-mail"]').val();

        $.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=order&id=" + id+'&name='+name+'&mail='+mail, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function(data){
                console.log(data);
                // alert('Ваш заказ сделан. В ближайшее время с вами свяжутся. Спасибо.')
                $('input[name="order-name"]').val('');
                $('input[name="order-mail"]').val('');
            }
        });
    });
});

$(function() {
 /*** Dropdown menu ***/

        var timeout    = 200;
        var closetimer = 0;
        var ddmenuitem = 0;

        function dd_open() {
            dd_canceltimer();
            dd_close();
            var liwidth = $(this).width();
            ddmenuitem = $(this).find('ul').css({'visibility': 'visible', 'width': liwidth});
            ddmenuitem.prev().addClass('dd_hover').parent().addClass('dd_hover');
        }

        function dd_close() {
            if(ddmenuitem) ddmenuitem.css('visibility', 'hidden').prev().removeClass('dd_hover').parent().removeClass('dd_hover');
        }

        function dd_timer() {closetimer = window.setTimeout(dd_close, timeout);
        }

        function dd_canceltimer() {
            if (closetimer) {
                window.clearTimeout(closetimer);
                closetimer = null;
            }
        }
        document.onclick = dd_close;

        $('#dd > li').bind('mouseover', dd_open);
        $('#dd > li').bind('mouseout',  dd_timer);

        $('#larr, #rarr').hide();
        $('.slideshow').hover(
            function(){
                $('#larr, #rarr').show();
            }, function(){
                $('#larr, #rarr').hide();
            }
        );

        /*** View mode ***/

        if ( $.cookie('mode') == 'grid' ) {
            grid_update();
        } else if ( $.cookie('mode') == 'list' ) {
            list_update();
        }

        $('#mode').toggle(
            function(){
                if ( $.cookie('mode') == 'grid' ) {
                    $.cookie('mode','list');
                    list();
                } else {
                    $.cookie('mode','grid');
                    grid();
                }
            },
            function(){
                if ( $.cookie('mode') == 'list') {
                    $.cookie('mode','grid');
                    grid();
                } else {
                    $.cookie('mode','list');
                    list();
                }
            }
        );

        function grid(){
            $('#mode').addClass('flip');
            $('#loop')
                .fadeOut('fast', function(){
                    grid_update();
                    $(this).fadeIn('fast');
                })
            ;
        }

        function list(){
            $('#mode').removeClass('flip');
            $('#loop')
                .fadeOut('fast', function(){
                    list_update();
                    $(this).fadeIn('fast');
                })
            ;
        }

        function grid_update(){
            $('#loop').addClass('grid').removeClass('list');
            $('#loop').find('.thumb img').attr({'width': '190', 'height': '190'});
            $('#loop').find('.post')
                .mouseenter(function(){
                    $(this)
                        .css('background-color','#FFEA97')
                        .find('.thumb').hide()
                        .css('z-index','-1');
                })
                .mouseleave(function(){
                    $(this)
                        .css('background-color','#f5f5f5')
                        .find('.thumb').show()
                        .css('z-index','1');
                });
            $('#loop').find('.post').click(function(){
                location.href=$(this).find('h2 a').attr('href');
            });
            $.cookie('mode','grid');
        }

        function list_update(){
            $('#loop').addClass('list').removeClass('grid');
            $('#loop').find('.post').removeAttr('style').unbind('mouseenter').unbind('mouseleave');
            $('#loop').find('.thumb img').attr({'width': '290', 'height': '290'});
            $.cookie('mode', 'list');
        }

        /*** Ajax-fetching posts ***/

        $('#pagination').on('click', function(e){
            e.preventDefault();
            $(this).addClass('loading').text('Загрузка...');
            $.ajax({
                type: "GET",
                url: $(this).attr('href') + '#loop',
                dataType: "html",
                success: function(out){
                    result = $(out).find('#loop .post');
                    nextlink = $(out).find('#pagination').attr('href');
                    $('#loop').append(result.fadeIn(300));
                    $('#pagination').removeClass('loading').text('Показать еще чаи');
                    if (nextlink != undefined) {
                        $('#pagination').attr('href', nextlink);
                    } else {
                        $('#pagination').remove();
                    }
                    if ( $.cookie('mode') == 'grid' ) {
                        grid_update();
                    } else {
                        list_update();
                    }
                }
            });
        });

        /*** Misc ***/

        $('#comment, #author, #email, #url')
            .focusin(function(){
                $(this).parent().css('border-color','#888');
            })
            .focusout(function(){
                $(this).parent().removeAttr('style');
            });
        $('.rpthumb:last, .comment:last').css('border-bottom','none');
});

