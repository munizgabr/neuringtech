<?php

function neuringtech_enqueue_scripts_input()
{
  $postfix = (defined('SCRIPT_DEBUG') && true === SCRIPT_DEBUG) ? '' : '.min';
?>

  <?php

  $js = array(
    'js_global' => [
      'jquery-3.2.1.min',
      'components/script',
      'components/menu-nav',
      'components/mask',
      'components/modal',
      'components/swiper',
      'jquery.mask',
    ],
    'js_home' => [
      'components/intlTelInput',
    ],
  );

  //JS
  foreach ($js['js_global'] as $item) {
    wp_enqueue_script($item, get_template_directory_uri() . "/build/js/" . "$item.js", array(), '');
  }

  // SWIPER JS
  wp_enqueue_script('jsswiper', 'https://unpkg.com/swiper@10/swiper-bundle.min.js', array(), neuringtech_VERSION);

  // SWIPPER CSS
  wp_enqueue_style('swiper', 'https://unpkg.com/swiper@10/swiper-bundle.min.css', array(), neuringtech_VERSION);

  if ((is_home() || is_front_page())) {

    foreach ($js['js_home'] as $item) {
      wp_enqueue_script($item, get_template_directory_uri() . "/build/js/" . "$item.js", array(), '');
    }
  }

  if ((is_page() || is_archive() || is_single() || is_404() || is_search())) {
    wp_enqueue_style('blog', get_template_directory_uri() . "/build/css/modules/blog.css", array(), neuringtech_VERSION);
  }


  //CSS

  wp_enqueue_style('global', get_template_directory_uri() . "/build/css/global.css", array(), neuringtech_VERSION);

  $translation_array = array(
    'siteURL' => get_site_url(),
    'siteUrlTemplate' => get_bloginfo('template_url'),
  );
  wp_localize_script('jquery-3.2.1.min', 'neuringtechData', $translation_array);
}

function neuringtech_activate_scripts()
{ ?>

  <script type="text/javascript">
    //cookies
    jQuery(document).ready(function($) {
      // Função para gerar um ID de sessão aleatório
      function generateSessionID() {
        const characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let sessionID = '';
        for (let i = 0; i < 10; i++) {
          const randomIndex = Math.floor(Math.random() * characters.length);
          sessionID += characters.charAt(randomIndex);
        }
        return sessionID;
      }

      // Função para verificar e obter o ID da sessão do Local Storage
      function getSessionID() {
        let sessionID = localStorage.getItem('sessionID');
        if (!sessionID) {
          sessionID = generateSessionID();
          localStorage.setItem('sessionID', sessionID);
        }
        return sessionID;
      }

      let sessionID = getSessionID(); // Obtém ou gera o ID da sessão

      let cookieHtml = '<div class="lgpd"><span>Nosso site utiliza cookies para melhorar a experiência do usuário. Acesse nossa página de <a href="https://www.delikitchen.com.br/política-de-privacidade" title="Ler Política de Privacidade do site">política de privacidade</a> para saber mais!</span><button class="cookie-btn">Aceitar</button></div>';

      let lsContent = localStorage.getItem('cookie-lgpd');
      if (!lsContent) {
        $('footer').append(cookieHtml);

        $('.cookie-btn').on('click', async function() {
          let cookieArea = $(this).closest('.lgpd');
          cookieArea.remove();

          // Enviar uma requisição POST para o endpoint do WordPress
          let requestData = {
            session_id: sessionID // Usar o valor da sessão gerado/acessado
          };

          try {
            let response = await $.post('/wp-json/custom/v1/set-cookie', requestData);
            if (response && response.message === 'Cookie acceptance stored') {
              let postId = response.post_id; // Capturar o ID do post criado
              localStorage.setItem('cookie-lgpd', postId); // Armazenar o ID no localStorage
            }
          } catch (error) {
            console.error('Erro ao enviar a requisição:', error);
          }
        });
      }
    });
    //SWIPER SLIDE CURSOS
    const swiper_cursos = new Swiper('.swiper-cursos', {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 25,
      autoplay: {
        delay: 5000,
        disableOnInteraction: true,

      },
      paginationClickable: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,

      },
      navigation: {
        nextEl: '.swiper-button-next-cursos',
        prevEl: '.swiper-button-prev-cursos',
      },
      breakpoints: {
        // define diferentes opções para diferentes larguras de tela
        768: {
          slidesPerView: 2,
          spaceBetween: 25,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 35,
        },
        1280: {
          slidesPerView: 3,
          spaceBetween: 45,
        }
      }
    });

    //SWIPER SLIDE DELIVERY
    const swiper_delivery = new Swiper('.swiper-delivery', {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 25,
      autoplay: {
        delay: 5000,
        disableOnInteraction: true,

      },
      paginationClickable: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,

      },
      navigation: {
        nextEl: '.swiper-button-next-cursos',
        prevEl: '.swiper-button-prev-cursos',
      },
      breakpoints: {
        // define diferentes opções para diferentes larguras de tela
        768: {
          slidesPerView: 2,
          spaceBetween: 25,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 35,
        },
        1280: {
          slidesPerView: 3,
          spaceBetween: 45,
        }
      }
    });
  </script>

<?php }

add_action('wp_enqueue_scripts', 'neuringtech_enqueue_scripts_input');
add_action('wp_footer', 'neuringtech_activate_scripts');
