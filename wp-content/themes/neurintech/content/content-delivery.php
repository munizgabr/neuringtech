<?php
$sectionTitle = get_sub_field('sectionTitle');
$sectionSubtitle = get_sub_field('sectionSubtitle');
// Obtém os campos personalizados da página de opções
$whatsappNumber = get_field('whatsapp_number', 'option');
$whatsappMessage = get_field('message', 'option');

// Verifica se é um dispositivo móvel
$isMobile = wp_is_mobile();
?><?php
    if (have_rows('blocks')) :

    ?>
<section class="delivery">
    <div class="center">
        <div class="delivery__title">
            <h3><?php echo $sectionTitle; ?></h3>
            <h2><?php echo $sectionSubtitle; ?></h2>
        </div>
        <div id="delivery" class="delivery__content">
            <div class="swiper-delivery">
                <div class="swiper-wrapper">
                    <?php
                    while (have_rows('blocks')) : the_row();
                        $blockTitle = get_sub_field('blockTitle');
                        $image = get_sub_field('image');
                        $description = get_sub_field('description');
                        $deliveryTime = get_sub_field('deliveryTime');
                        $price = get_sub_field('price');
                    ?>
                        <div class="swiper-slide">
                            <div class="delivery__content--block">
                                <img src="<?php echo $image; ?>" style="width: 415px; height: 340px;" alt="<?php echo $blockTitle; ?>">
                                <span><?php echo $blockTitle; ?></span>
                                <p><?php echo $description; ?></p>
                                <span class="delivery__content--block-span">
                                    <div class="delivery__content--block-div">
                                        <img src="<?php bloginfo('template_url') ?>/src/images/delivery.png" alt="Tempo de entrega"> Tempo médio de entrega: <?php echo $deliveryTime; ?>
                                    </div>
                                    <div class="delivery__content--block-div">
                                        <img src="<?php bloginfo('template_url') ?>/src/images/price.png" alt="Preço do produto"> Preço: <?php echo $price; ?>
                                    </div>
                                </span>
                                <?php
                                // Monta o link do WhatsApp de acordo com o dispositivo
                                $whatsappLink = 'https://web.whatsapp.com/send?phone=' . $whatsappNumber . '&text=' . urlencode($whatsappMessage);
                                if ($isMobile) {
                                    $whatsappLink = 'https://api.whatsapp.com/send?phone=' . $whatsappNumber . '&text=' . urlencode($whatsappMessage);
                                }
                                ?>
                                <!-- Link do WhatsApp -->
                                <a class="btn" href="<?php echo $whatsappLink; ?>" target="_blank" title="Peça já o seu!">Peça já!</a>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<?php
    else :
        echo '<span style="display: none;"></span>';
    endif;
?>