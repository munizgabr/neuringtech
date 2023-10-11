<?php
$desktopImage = get_sub_field('desktopImage');
$mobileImage = get_sub_field('mobileImage');
$text = get_sub_field('text');
?>
<div class="discover center">
    <div class="courses">
        <span><?php echo $text['title'];?> &rarr;</span>
        <h2><?php echo $text['content'];?></h2>
    </div>
    <picture>
        <source media="(max-width:680px)" srcset="<?php echo $mobileImage;?>">
        <img src="<?php echo $desktopImage;?>" alt="logo Deli Kitchen">
    </picture>
</div>