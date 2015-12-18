function initSliderArtCraft(){
    var widthWrap = $('.wrap').width();
    var widthContainer = $('.container').width();
    var distance = (widthWrap - widthContainer) / 2;
    $('.slider-arrow--left').css({'left':distance});
    $('.slider-arrow--right').css({'right':distance});
   // console.log(widthWrap);
  //  console.log(widthContainer);
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
        infinite: true,
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

$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

jQuery(document).ready(function($) {
    var id;
    var glide = $('.slider-top').glide().data('api_glide');

    $('#pochta').tooltip();

    $(document).on('click', '.buy-but', function(){
        id = $(this).attr('data-item');
        console.log(id);
        $.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=add_to_cart&id=" +id, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function(data){
                console.log(data);
            }
        });
        return false;
    });

    $(document).on('click', '.send-order', function(){
        var name = $('input[name="order-name"]').val();
        var mail = $('input[name="order-mail"]').val();
        var phone = $('input[name="order-phone"]').val();
        var address = $('input[name="order-address"]').val();

        $.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=order&name="+name+"&mail="+mail+"&phone="+phone+"&address="+address, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function(data){
                //console.log(data);
                $('#ok-modal').modal('show');
            }
        });
    });

    $(document).on('click', '.subs__sub', function(){
        var mail = $('.subs__input').val();

        $.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=subscription&mail=" +mail, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function(data){
                alert('Вы подписаны на рассылку!');
                $('.subs__input').val('');
            }
        });
    });

    $(document).on('click', '.more-tea', function(){
        var num = $(this).attr('data-page');

        $.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=store_more&num=" +num, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function(data){
                num = num+1;
                $('.store-row').append(data);
                $('.more-tea').attr('data-page', num);
            }
        });
        return false;
    });

    $(document).on('click', '.more-review', function(){
        var num = $(this).attr('data-page');

        $.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=review_more&num=" +num, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function(data){
                $('.review-row').append(data);
                $('.more-review').attr('data-page', num+1);
            }
        });
        return false;
    });

    $(document).on('click', '.delete-from-cart', function(){
        var block = $(this).parent().parent().parent();
        var delId = block.attr('data-id');

        $.ajax({
            url: ajaxurl, //url, к которому обращаемся
            type: "POST",
            data: "action=del_from_cart&id=" +delId, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function(data){
               // console.log(data);
                block.remove();
                location.reload();
            }
        });

    });

    $(document).on('change','input[name="delivery"]', function(){
        var productPrice = $('input[name="sum"]').val();
        var type = $(this).val();

        if(type == 'pochta'){
            var typePrice = $(this).attr('data-price');
            $('.totalPrice').text(parseInt(typePrice)+parseInt(productPrice) + ' р. ');
        }else if(type == 'curier'){
            $('.totalPrice').html(productPrice + ' р. <a id="managerDelivery" data-toggle="tooltip" title="необходимо уточнить у менеджера детали">(*)</a>');
            $('#managerDelivery').tooltip();

        }else if(type == 'samovivoz'){
            $('.totalPrice').html(productPrice+' р. <a id="managerDelivery" data-toggle="tooltip" title="необходимо уточнить у менеджера детали">(*)</a>');
            $('#managerDelivery').tooltip();
        }

        $('input[name="deliveryType"]').val(type);
    });

    $(document).on('change','input[name="payment"]', function(){
        var productPrice = $('input[name="sum"]').val();
        var type = $(this).val();
        var typePrice = $('input[name="delivery"]:checked').attr('data-price');

        if(type == 'robokassa'){
            $('.totalPrice').text(parseInt(typePrice)+parseInt(productPrice)+' р.');
        }else if(type == 'cash'){
            $('.totalPrice').html(parseInt(typePrice)+parseInt(productPrice) + ' р. <a id="managerPayment" data-toggle="tooltip" title="необходимо уточнить у менеджера детали">(*)</a>');
            $('#managerPayment').tooltip();

        }else if(type == 'manager'){
            $('.totalPrice').html(parseInt(typePrice)+parseInt(productPrice)+' р.');
            $('#managerPayment').tooltip();

        }

        $('input[name="paymentType"]').val(type);
    });

});


