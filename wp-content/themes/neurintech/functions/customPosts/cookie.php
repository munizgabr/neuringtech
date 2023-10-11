<?php
// Registrar um Custom Post Type para armazenar as informações de aceitação de cookies
function register_cookie_acceptance_post_type() {
    $labels = array(
        'name' => 'Aceitação de Cookies',
        'singular_name' => 'Aceitação de Cookies',
        'menu_name' => 'Cookies',
        'add_new' => 'Adicionar Nova',
        'add_new_item' => 'Adicionar Nova Aceitação de Cookies',
        'edit_item' => 'Editar Aceitação de Cookies',
        'new_item' => 'Nova Aceitação de Cookies',
        'view_item' => 'Ver Aceitação de Cookies',
        'view_items' => 'Ver Aceitações de Cookies',
        'search_items' => 'Procurar Aceitações de Cookies',
        'not_found' => 'Nenhuma Aceitação de Cookies encontrada',
        'not_found_in_trash' => 'Nenhuma Aceitação de Cookies encontrada na Lixeira',
    );

    $args = array(
        'labels' => $labels,
        'public' => false, // Defina como true se quiser que seja público
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => false,
        'rewrite' => false,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author'),
    );

    register_post_type('cookie_acceptance', $args);
}
add_action('init', 'register_cookie_acceptance_post_type');
