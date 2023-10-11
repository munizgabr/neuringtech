<?php

function custom_cookie_endpoint() {
    register_rest_route('custom/v1', '/set-cookie', array(
        'methods' => 'POST',
        'callback' => 'store_cookie_info',
    ));
}
add_action('rest_api_init', 'custom_cookie_endpoint');


function store_cookie_info($request)
{
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $timestamp = current_time('timestamp');

    // Pegar os parâmetros da requisição POST
    $params = $request->get_json_params();

    // Extrair o ID da sessão da resposta JSON
    $session_id = $params['session_id'];

    // Criar um post personalizado
    $post_args = array(
        'post_type' => 'cookie_acceptance', // Nome do post personalizado
        'post_status' => 'publish',
        'post_title' => 'Cookie Acceptance', // Título do post
        'post_content' => json_encode(array( // Armazenar os dados em formato JSON
            'session_id' => $session_id,
            'user_ip' => $user_ip,
            'user_agent' => $user_agent,
            'timestamp' => $timestamp,
        )),
    );

    // Inserir o post personalizado
    $post_id = wp_insert_post($post_args);

    if (!is_wp_error($post_id)) {
        return new WP_REST_Response(array('message' => 'Cookie acceptance stored', 'post_id' => $post_id), 200);
    } else {
        return new WP_REST_Response(array('message' => 'Error storing cookie acceptance'), 500);
    }
}
