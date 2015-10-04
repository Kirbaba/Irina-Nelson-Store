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
    wp_enqueue_script( 'cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array(), '1');
    wp_enqueue_script( 'my-bootstrap-extension', get_template_directory_uri() . '/js/bootstrap.js', array(), '1');
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/script.js', array(), '1');
    wp_enqueue_script( 'fotorama-js', get_template_directory_uri() . '/js/fotorama.js', array(), '1');
    wp_enqueue_script( 'glide', get_template_directory_uri() . '/js/jquery.glide.js', array(), '1');


}

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

//function register_slider_page(){
//    add_menu_page(
//        'Управление слайдером', 'Слайдер', 'manage_options', 'slider_top', 'admin_slider_page', '', 200
//    );
//}
//add_action( 'admin_menu', 'register_slider_page' );

function admin_slider_page(){

}

function print_slider() {
    $parser = new Parser();
    $parser->render(TM_DIR . '/views/slider.php', []);
}
add_shortcode('slider_top', 'print_slider');

/*------------------------СТРАНИЦА------------------------------*/
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
    global $wpdb;

    $html = '';
    $type = 'store';
    $args = array(
        'post_type' => $type,
        'post_status' => 'publish',
        'posts_per_page' => 3);

    $my_query = null;
    $my_query = new WP_Query($args);

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
										<h4>Цена: <b>'.get_post_meta($my_query->post->ID, 'price', 1).'</b></h4>
										<a href="#" class="buy-but" data-toggle="modal" data-target="#buy-modal" data-item="'.$my_query->post->ID.'">Купить</a>
									</div>
								</div>';
        endwhile;
    }
    wp_reset_query();  // Restore global post data stomped by the_post().

    return $html;
}

add_shortcode('store', 'store_sc');

function reviews_sc(){
    $type = 'reviews';
    $args = array(
        'post_type' => $type,
        'post_status' => 'publish',
        'posts_per_page' => 3);

    $my_query = null;
    $my_query = new WP_Query($args);

    $parser = new Parser();
    $parser->render(TM_DIR . '/views/reviews.php', ['my_query' => $my_query]);
}

add_shortcode('reviews', 'reviews_sc');

add_action('wp_ajax_order', 'set_order');

function set_order(){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $admin_email = get_option('admin_email');

    $title = get_the_title($id);
    $subtitle = get_post_meta($id, 'subtitle', 1);
    $price = get_post_meta($id, 'price', 1);

    mail($admin_email, "Заказ товара с вашего сайта", "С вашего сайта заказали товар:<br>ID товара: $id<br> Название: $title ( $subtitle ) <br>Цена: $price <br> Имя заказчика: $name<br> Email для связи: $mail","Content-type: text/html; charset=UTF-8\r\n");
    die();
}


