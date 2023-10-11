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
<section class="class">
    <div class="center">
        <div class="class__title">
            <h3><?php echo $sectionTitle; ?></h3>
            <h2><?php echo $sectionSubtitle; ?></h2>
        </div>
        <div id="cursos" class="class__content">
            <div class="swiper-cursos">
                <div class="swiper-wrapper">
                    <?php
                    while (have_rows('blocks')) : the_row();
                        $blockTitle = get_sub_field('blockTitle');
                        $image = get_sub_field('image');
                        $description = get_sub_field('description');
                    ?>
                        <div class="swiper-slide">
                            <div class="class__content--block">
                                <img src="<?php echo $image; ?>" style="width: 415px; height: 340px;" alt="<?php echo $blockTitle; ?>">
                                <span><?php echo $blockTitle; ?></span>
                                <p><?php echo $description; ?></p>
                                <?php
                                // Monta o link do WhatsApp de acordo com o dispositivo
                                $whatsappLink = 'https://web.whatsapp.com/send?phone=' . $whatsappNumber . '&text=' . urlencode($whatsappMessage);
                                if ($isMobile) {
                                    $whatsappLink = 'https://api.whatsapp.com/send?phone=' . $whatsappNumber . '&text=' . urlencode($whatsappMessage);
                                }
                                ?>
                                <!-- Link do WhatsApp -->
                                <a class="btn" href="<?php echo $whatsappLink; ?>" target="_blank" title="Saiba mais sobre o curso">Saiba mais</a>
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