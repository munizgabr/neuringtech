<?php
$backgroundColor = get_sub_field('backgroundColor');
$image = get_sub_field('image');
$title = get_sub_field('title');
$description = get_sub_field('description');
?>
<section class="about-us" style="background-color: <?php echo $backgroundColor;?>;">
    <div id="sobre" class="about-us__content center">
        <img src="<?php echo $image;?>" alt="Comidas tropicais">
        <div class="about-us__txt">
            <h2>
            <?php echo $title;?>
            </h2>
            <p><?php echo $description;?></p>
            <span><img width="180px" src="<?php bloginfo('template_url')?>/src/images/massa.png" alt="Assinatura Deli Kitchen"></span>
        </div>
    </div>
</section>