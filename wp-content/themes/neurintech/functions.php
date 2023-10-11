<?php

define( 'neuringtech_VERSION', '0.0.8' );
add_theme_support( 'post-thumbnails' );

// if (function_exists('add_image_size')) {
//   add_image_size( 'thumb_1', 1000, 555, true );
// }

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Functions
require(get_template_directory() . '/functions/scripts-footer.php');
require(get_template_directory() . '/functions/login-style.php' );
require(get_template_directory() . '/functions/pagination.php' );
require(get_template_directory() . '/functions/widgets.php' );

//customPosts
require(get_template_directory() . '/functions/customPosts/cookie.php' );
require(get_template_directory() . '/functions/endpoints/cookieAccept.php' );

//Options page
if( function_exists('acf_add_options_page') ):
  acf_add_options_page(
    [
      'menu_title'=>'Whatsapp',
      'page_title'=>'Whatsapp',
      'position'=>'4',
      'menu_slug'=>'pagina_contato',
      'update_button'=>'Cadastrar whtsapp',
      'updated_message'=>'Whatsapp cadastrado com sucesso!',
      'icon_url'=>'dashicons-whatsapp'
    ]

    );
endif;