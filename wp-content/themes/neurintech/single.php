<?php
/**
 *
 * @package neuringtech Dev
 * @since 0.0.1
 */
get_header();
?>
	<div class="container">
		<div class="center">
			<div class="wrapper-page">
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post();
					$autor = get_field('autor'); ?>
				<div class="wrapper-left">
					<div class="breadcrumb">
						<?php if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb('Você está aqui: <span class="breadcrumb">','</span>');
						} ?>
					</div>
					<h1 class="title"><?php the_title(); ?></h1>
					<div class="line-info">
						<?php
							$u_time = get_the_time('U');
							$u_modified_time = get_the_modified_time('U');
						 ?>
						<span class="date-post-article"><i>Publicado em:</i> <?php the_time('d/m/Y') ?>
						<?php
							if ($u_modified_time >= $u_time + 86400) {
								echo " | <i style='font-style:italic'>Última modificação em ";
									the_modified_time('d/m/Y');
								echo "</i>";
							}
						?>
						</span>
					</div>
					<?php wpb_set_post_views(get_the_ID()); ?>
					<?php the_content(); ?>
					<?php if($autor == true){
						get_template_part( 'content/content', 'author' );
					} ?>
					<div class="group-share line">
						<h3 class="subtitle-post">Compartilhe</h3>
						<ul class="share-post">
							<li class='icone-facebook'><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink();?>" title="Facebook"><span>Facebook</span></a></li>
							<li class='icone-twitter'><a target="_blank" href="https://twitter.com/intent/tweet?text=<?php $conteudo = get_the_excerpt(); $limite_conteudo = wp_trim_words( $conteudo, 10, '' ); echo $limite_conteudo;?> <?php echo get_the_permalink();?>" title="Twitter"><span>Twitter</span></a></li>
							<li class="icone-linkedin"><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink();?>/&title=<?php echo get_the_title();?>&summary=&source=" title="LinkedIn"><span>LinkedIn</span></a></li>
						</ul>
					</div>
					<div id="comentarios" class="comments">
						<?php comments_template( '', true ); ?>
					</div>
					<?php endwhile; endif;?>
					<?php get_template_part( 'content/content', 'related' ); ?>
				</div><div class="wrapper-right">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>