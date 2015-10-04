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
    global $wpdb;
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



