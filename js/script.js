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

