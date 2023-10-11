<?php
/**
 *
 * @package neuringtech Dev
 * @since 0.0.1
 */
get_header();
?>
<div class="container">
		<div class="top-search">
			<div class="center">
				<div class="text">
					<h1>Resultado da busca</h1>
					<?php
					$allsearch = new WP_Query("s=$s&showposts=-1");
					$key = esc_html($s, 1);
					$count = $allsearch->post_count;
					?>
					<p><?php echo $count; ?> <?php echo ($count == 1 ? 'resultado encontrado' : 'resultados encontrados'); ?></p>
				</div
				><div class="form">
					<?php get_template_part( 'content/content', 'searchform' ); ?>
				</div>
			</div>
		</div>
	<div class="center">
		<div class="wrapper-page">
			<div class="wrapper-full">
				<?php if ( have_posts() ) : ?>
					<div class="itens-posts">
						<?php while ( have_posts() ) : the_post();?><div class="item-post">
								<div class="image">
									<?php if(has_post_thumbnail()){
										echo '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">';
											echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
										echo '</a>';
										} else {
										echo '<a href="'. get_the_permalink() . '" title="' . get_the_title() . '">';
											echo '<img src='. get_bloginfo('template_url'). '/src/images/sem-imagem.jpg>';
										echo '</a>';
									} ?>
									<div class="date-post">
										<?php
											$ano = get_the_time('Y');
										?>
										<strong><?php the_time('d') ?></strong>
										<span><?php the_time('M') ?></span>
										<strong><?php echo substr($ano, 2);  ?></strong>
									</div>
								</div
								><div class="text">
									<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
									<?php if(!empty(get_the_excerpt())) {
									   echo '<p>' . wp_trim_words(get_the_excerpt(), 35, '...') . '</p>';
									} ?>
									<a href="<?php the_permalink(); ?>" class="more-item" title="<?php the_title(); ?>"><span class="uppercase">Saiba mais</span></a>
								</div>
							</div><?php endwhile; ?>
					</div>
				<?php else : ?>
					<h2>Nenhum conteúdo cadastrado</h2>
					<p>Não há nenhuma informação disponível ainda</p>
				<?php endif; ?>
				<?php if (function_exists('pagination')) pagination(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>