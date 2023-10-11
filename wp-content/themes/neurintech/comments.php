<?php
/**
 * @package WordPress
 * @subpackage my_framework
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h3 class="subtitle-post">Comentários</h3>
	<ol class="commentlist">
	<?php wp_list_comments(); ?>
	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<!--p class="nocomments">Comments are closed.</p-->

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond" class="comment-respond">
<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logado em</a> para post a comment.</p>
<?php else : ?>

<div class="form-wpcf7">
	<h3 class="subtitle-post">Deixe seu comentário</h3>
	<p><small>Os campos com * são obrigatórios</small></p>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p>Logado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Sair &raquo;</a></p>

<?php else : ?>
<div class="group-field">
<div class="field col2"><label for="author">Nome:* </label><?php if ($req) echo ""; ?></small></label><input class="input-control" type="text" name="author" id="author" placeholder="Insira seu nome" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" required <?php if ($req) echo "aria-required='true'"; ?> /></div>
<div class="field col2"><label for="email">Email:* </label><?php if ($req) echo ""; ?></small></label><input class="input-control" type="text" name="email" id="email" placeholder="Insira seu email (Não será publicado)" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" required <?php if ($req) echo "aria-required='true'"; ?> /></div>

<div class="field col1"><label for="url">Site: </label><input class="input-control" type="text" name="url" id="url" placeholder="Insira seu website ou blog" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" /></div>
</div>


<?php endif; ?>

<div class="field col1"><label for="comment">Mensagem: </label><p class="field-comentario"><textarea class="textarea-control" name="comment" id="comment" placeholder="Insira o comentário aqui" cols="58" rows="10" tabindex="4" required></textarea></div>



<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->



<input class="btn-default" name="submit" type="submit" id="submit" tabindex="5" value="Comentar" />
	</div>
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>
</form>
</div>
<?php endif; // If registration required and not logged in ?>


<?php endif; // if you delete this the sky will fall on your head ?>