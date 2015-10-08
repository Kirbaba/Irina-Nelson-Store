<?php

define('TM_DIR', get_template_directory(__FILE__));
define('TM_URL', get_template_directory_uri(__FILE__));

require_once TM_DIR . '/lib/Parser.php';

function add_style(){
    wp_enqueue_style( 'my-bootstrap-extension', get_template_directory_uri() . '/css/bootstrap.css', array(), '1');
    wp_enqueue_style( 'font-ewesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array('my-bootstrap-extension'), '1');
    wp_enqueue_style( 'my-styles', get_template_directory_uri() . '/css/style.css', array('my-bootstrap-extension'), '1');
    wp_enqueue_style( 'my-sass', get_template_directory_uri() . '/sass/style.css', array('my-bootstrap-extension'), '1');
    wp_enqueue_style( 'fotorama', get_template_directory_uri() . '/css/fotorama.css', array('my-bootstrap-extension'), '1');
}

function add_script(){
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', array(), '1');
    wp_enqueue_script( 'jq', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '1');
    wp_enqueue_script( 'my-bootstrap-extension', get_template_directory_uri() . '/js/bootstrap.js', array(), '1');
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/script.js', array(), '1');
    wp_enqueue_script( 'fotorama-js', get_template_directory_uri() . '/js/fotorama.js', array(), '1');
    wp_enqueue_script( 'glide', get_template_directory_uri() . '/js/jquery.glide.js', array(), '1');

}

function add_admin_script(){
    wp_enqueue_script('admin',get_template_directory_uri() . '/js/admin.js', array(), '1');
    wp_enqueue_style( 'my-bootstrap-extension-admin', get_template_directory_uri() . '/css/bootstrap.css', array(), '1');
    wp_enqueue_style( 'my-style-admin', get_template_directory_uri() . '/css/admin.css', array(), '1');

}

add_action('admin_enqueue_scripts', 'add_admin_script');
add_action( 'wp_enqueue_scripts', 'add_style' );
add_action( 'wp_enqueue_scripts', 'add_script' );

function prn($content) {
    echo '<pre style="background: lightgray; border: 1px solid black; padding: 2px">';
    print_r ( $content );
    echo '</pre>';
}

function my_pagenavi() {
    global $wp_query;

    $big = 999999999; // уникальное число для замены

    $args = array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) )
    ,'format' => ''
    ,'current' => max( 1, get_query_var('paged') )
    ,'total' => $wp_query->max_num_pages
    );

    $result = paginate_links( $args );

    // удаляем добавку к пагинации для первой страницы
    $result = str_replace( '/page/1/', '', $result );

    echo $result;
}

function excerpt_readmore($more) {
    return '... <br><a href="'. get_permalink($post->ID) . '" class="readmore">' . 'Читать далее' . '</a>';
}
add_filter('excerpt_more', 'excerpt_readmore');


if ( function_exists( 'add_theme_support' ) )
    add_theme_support( 'post-thumbnails' );

/*------------------------Слайдер (top)------------------------------*/

function register_slider_page(){
    add_menu_page(
        'Управление слайдером', 'Слайдер', 'manage_options', 'slider_top', 'admin_slider_page', '', 200
    );
}
add_action( 'admin_menu', 'register_slider_page' );

function admin_slider_page(){
    global $wpdb;
    $parser = new Parser();

    if(isset($_GET['del'])){
        $wpdb->delete( 'slider_top', ['id'=>$_GET['del']] );
    }
    if(isset($_POST['attachment_url'])){
        //prn($_POST);
        $wpdb->insert( 'slider_top', ['link' => $_POST['attachment_url']] );
    }

    $slids = $wpdb->get_results('SELECT * FROM `slider_top`', ARRAY_A);

    //prn($slids);

    if (function_exists('wp_enqueue_media')) {
        wp_enqueue_media();
    } else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }


    $parser->render(TM_DIR . '/views/slider_admin_page.php', ['slids'=>$slids]);
}

function print_slider() {
    global $wpdb;
    $parser = new Parser();
    $slids = $wpdb->get_results('SELECT * FROM `slider_top`', ARRAY_A);
    $parser->render(TM_DIR . '/views/slider.php', ['slids'=>$slids]);
}
add_shortcode('slider_top', 'print_slider');

/*------------------------Слайдер (блог)------------------------------*/

function print_slider_blog() {
    $parser = new Parser();
    $catId = get_category_by_slug( 'blog' );
    $catId = $catId->term_id;
    $posts = get_posts(['numberposts'=>-1, 'category'=>$catId, 'order'=>'DESC']);
    //prn($posts);
    $parser->render(TM_DIR . '/views/blog_slider.php', ['posts'=>$posts]);
}
add_shortcode('slider_blog', 'print_slider_blog');

/*------------------------СТРАНИЦА СОБЫТИЯ------------------------------*/
add_action('init', 'my_custom_init_store');
function my_custom_init_store()
{
    $labels = array(
        'name' => 'Магазин', // Основное название типа записи
        'singular_name' => 'Товар', // отдельное название записи типа Book
        'add_new' => 'Добавить товар',
        'add_new_item' => 'Добавить новый товар',
        'edit_item' => 'Редактировать товар',
        'new_item' => 'Новый товар',
        'view_item' => 'Посмотреть товар',
        'search_items' => 'Найти товар',
        'not_found' =>  'Товаров не найдено',
        'not_found_in_trash' => 'В корзине товаров не найдено',
        'parent_item_colon' => '',
        'menu_name' => 'Товары'

    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail')
    );
    register_post_type('store',$args);


}

/*------------------------СТРАНИЦА------------------------------*/
add_action('init', 'my_custom_init_reviews');
function my_custom_init_reviews()
{
    $labels = array(
        'name' => 'Отзывы', // Основное название типа записи
        'singular_name' => 'Отзыв', // отдельное название записи типа Book
        'add_new' => 'Добавить отзыв',
        'add_new_item' => 'Добавить новый отзыв',
        'edit_item' => 'Редактировать отзыв',
        'new_item' => 'Новый отзыв',
        'view_item' => 'Посмотреть отзыв',
        'search_items' => 'Найти отзыв',
        'not_found' =>  'Отзывов не найдено',
        'not_found_in_trash' => 'В корзине отзывов не найдено',
        'parent_item_colon' => '',
        'menu_name' => 'Отзывы'

    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail')
    );
    register_post_type('reviews',$args);


}

function my_extra_fields() {
    add_meta_box( 'extra_price', 'Цена', 'extra_fields_box_func', 'store', 'normal', 'high'  );
    add_meta_box( 'extra_price', 'Цена', 'extra_fields_box_func', 'post', 'normal', 'high'  );
    add_meta_box( 'extra_subtitle', 'Подзаголовок', 'extra_fields_title_func', 'store', 'normal', 'high'  );
    add_meta_box( 'extra_years', 'Возраст', 'extra_fields_years_func', 'reviews', 'normal', 'high'  );
}
add_action('add_meta_boxes', 'my_extra_fields', 1);

function extra_fields_box_func( $post ){
    ?>
    <p><span>Введите только цифры.</span><input type="text"  name="extra[price]" value="<?php echo get_post_meta($post->ID, 'price', 1); ?>" style="width:50%" /></p>
    <?php
}
function extra_fields_title_func( $post ){
    ?>
    <p><span>Введите подзаголовок.</span><input type="text"  name="extra[subtitle]" value="<?php echo get_post_meta($post->ID, 'subtitle', 1); ?>" style="width:50%" /></p>
    <?php
}
function extra_fields_years_func( $post ){
    ?>
    <p><span>Укажите возраст.</span><input type="text"  name="extra[years]" value="<?php echo get_post_meta($post->ID, 'years', 1); ?>" style="width:50%" /></p>
    <?php
}

add_action('save_post', 'my_extra_fields_update', 10, 1);

/* Сохраняем данные, при сохранении поста */
function my_extra_fields_update( $post_id ){

    if( !isset($_POST['extra']) ) return false;
    foreach( $_POST['extra'] as $key=>$value ){
        if( empty($value) ){
            delete_post_meta($post_id, $key); // удаляем поле если значение пустое
            continue;
        }

        update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
    }
    return $post_id;
}

function store_sc(){
    if($_POST['num']){
        $page = $_POST['num'];
    }else{
        $page = 1;
    }

    $html = '';
    $type = 'store';
    $args = array(
        'post_type' => $type,
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'paged'=> $page);

    $my_query = null;
    $my_query = new WP_Query($args);

    //prn($my_query);

    if( $my_query->have_posts() ) {
        while ($my_query->have_posts()) : $my_query->the_post();

           // prn($my_query->post->ID);

            $html .= '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 post">
									<div class="store__item">
										<h3>'.get_the_title().'</h3>
										<h5>'. get_post_meta($my_query->post->ID, 'subtitle', 1).'</h5>
										<div class="store__thumb">
											'.get_the_post_thumbnail($my_query->post->ID,'full').'
											<div class="store__thumb--text">
												<p>'.get_the_content().'</p>
											</div>
										</div>
										<h4>Цена: <b>'.get_post_meta($my_query->post->ID, 'price', 1).' р.</b></h4>
										<a href="#" class="buy-but" data-toggle="modal" data-target="#buy-modal" data-item="'.$my_query->post->ID.'">Купить</a>
									</div>
								</div>';
        endwhile;
    }
    wp_reset_query();  // Restore global post data stomped by the_post().

    echo $html;

    if($_POST['num']){
        die();
    }

}

add_shortcode('store', 'store_sc');

function reviews_sc(){

    if($_POST['num']){
        $page = $_POST['num'];
    }else{
        $page = 1;
    }

    $type = 'reviews';
    $args = array(
        'post_type' => $type,
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'paged'=> $page);

    $my_query = null;
    $my_query = new WP_Query($args);

    $parser = new Parser();
    $parser->render(TM_DIR . '/views/reviews.php', ['my_query' => $my_query]);

    if($_POST['num']){
        die();
    }


}

add_shortcode('reviews', 'reviews_sc');

add_action('wp_ajax_nopriv_order', 'set_order');
add_action('wp_ajax_order', 'set_order');
add_action('wp_ajax_nopriv_subscription', 'add_subscribe');
add_action('wp_ajax_subscription', 'add_subscribe');
add_action('wp_ajax_nopriv_store_more', 'store_sc');
add_action('wp_ajax_store_more', 'store_sc');
add_action('wp_ajax_nopriv_review_more', 'reviews_sc');
add_action('wp_ajax_review_more', 'reviews_sc');
add_action('wp_ajax_nopriv_add_to_cart', 'addToCart');
add_action('wp_ajax_add_to_cart', 'addToCart');
add_action('wp_ajax_nopriv_del_from_cart', 'delFromCart');
add_action('wp_ajax_del_from_cart', 'delFromCart');


function set_order(){

    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $admin_email = get_option('admin_email');

    $items = explode(',',$_COOKIE['cartCookie']);
    //получаем количество одинаковых товаров
    $items = array_count_values($items);


    $str = "С вашего сайта заказали товар:<br>";
    $sum = 0;
    foreach($items as $key => $value){
        $sum = $sum + $value*get_post_meta($key, 'price', 1);

        $str .= 'ID товара: '.$key.'<br>';
        $str .= 'Название: '.get_the_title($key).' ('.get_post_meta($key, 'subtitle', 1).') <br>';
        $str .= 'Кол-во: '. $value .' <br>';
        $str .= 'Цена: '. $value*get_post_meta($key, 'price', 1) .' р. <br><br>';
    }

    $str .= 'Итого: '.$sum.' р. <br><br>';
    $str .= 'Имя заказчика: '.$name.' <br>';
    $str .= 'Email : '.$mail.' <br>';
    $str .= 'Телефон для связи : '.$phone.' <br>';
    $str .= 'Адресс доставки : '.$address.' <br>';

    mail($admin_email, "Заказ товара с вашего сайта",
        $str,
        "Content-type: text/html; charset=UTF-8\r\n");

    setcookie("cartCookie", "", time()+86400,'/');
    die();
}

function add_subscribe(){
    $mail = $_POST['mail'];
    $admin_email = get_option('admin_email');

    mail($admin_email, "Подписка на сайт", "На ваш сайт подписался данный email: $mail","Content-type: text/html; charset=UTF-8\r\n");
    die();
}

/**
 * Добавляет секции, параметры и элементы управления (контролы) на страницу настройки темы
 */
add_action('customize_register', function($customizer){
    /*Меню настройки контактов*/
    $customizer->add_section(
        'contacts_section',
        array(
            'title' => 'Настройки контактов',
            'description' => 'Контакты',
            'priority' => 35,
        )
    );
    $customizer->add_setting(
        'phone_textbox',
        array('default' => '8 800 003 99 22')
    );
    $customizer->add_control(
        'phone_textbox',
        array(
            'label' => 'Телефон',
            'section' => 'contacts_section',
            'type' => 'text',
        )
    );
    /*меню настройки соц сетей*/
    $customizer->add_section(
        'social_section',
        array(
            'title' => 'Соц. сети',
            'description' => 'Ссылки на соц. сети',
            'priority' => 35,
        )
    );
    $customizer->add_setting(
        'tw_textbox',
        array('default' => 'http://twitter.com/')
    );
    $customizer->add_setting(
        'vk_textbox',
        array('default' => 'http://vk.com/')
    );
    $customizer->add_setting(
        'fb_textbox',
        array('default' => 'http://facebook.com/')
    );
    $customizer->add_setting(
        'insta_textbox',
        array('default' => 'http://instagram.com/')
    );
    $customizer->add_setting(
        'gpl_textbox',
        array('default' => 'https://plus.google.com')
    );
    $customizer->add_setting(
        'smile_textbox',
        array('default' => '')
    );
    $customizer->add_setting(
        'ok_textbox',
        array('default' => 'http://ok.ru/')
    );
    $customizer->add_setting(
        'yt_textbox',
        array('default' => 'http://youtube.com/')
    );

    $customizer->add_control(
        'vk_textbox',
        array(
            'label' => 'VKontakte',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'fb_textbox',
        array(
            'label' => 'Facebook',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'insta_textbox',
        array(
            'label' => 'Instagram',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'gpl_textbox',
        array(
            'label' => 'Google+',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'smile_textbox',
        array(
            'label' => 'Smile',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'ok_textbox',
        array(
            'label' => 'Одноклассники',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'tw_textbox',
        array(
            'label' => 'Twitter',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'yt_textbox',
        array(
            'label' => 'Youtube',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
});

function addToCart(){
    $itemId = $_POST['id'];

    if(isset($_COOKIE['cartCookie'])){
       $newCookie = $_COOKIE['cartCookie'].','.$itemId;
    }else{
        $newCookie = $itemId;
    }

    setcookie("cartCookie", $newCookie, time()+86400,'/');
   // prn($newCookie);
    die();
}

function delFromCart(){
    $itemId = $_POST['id'];

    $items = explode(',',$_COOKIE['cartCookie']);
    //получаем количество одинаковых товаров


    foreach($items as $key => $item){
        if($item == $itemId){
            unset($items[$key]);
        }
    }

   // prn($items);
    $items = implode(',',$items);

    setcookie("cartCookie", $items, time()+86400,'/');
    // prn($newCookie);
    die();
}

function order_page_sc(){

    $items = explode(',',$_COOKIE['cartCookie']);
    //получаем количество одинаковых товаров
    if(empty($items[0])){
        $items[0] = 0;
    }else{
        $items = array_count_values($items);
    }

    $parser = new Parser();
    $parser->render(TM_DIR . '/views/ordergrid.php', ['items' => $items]);
}

add_shortcode('order_page', 'order_page_sc');

function sales_sc(){
    $parser = new Parser();
    $catId = get_category_by_slug( 'sales' );
    $catId = $catId->term_id;
    $posts = get_posts(['numberposts' => 3, 'category' => $catId, 'order' => 'DESC']);
    $parser->render(TM_DIR . '/views/sales.php', ['posts'=>$posts]);
}

add_shortcode('sales', 'sales_sc');
