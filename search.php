<?php get_header(); ?>

	<section id="main">
		<h2>Resultados de la búsqueda</h2>
		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<small>Publicado el <?php the_time('j/m/Y') ?> por <?php the_author_posts_link() ?>  </small>
			<div class="thumbnail">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			?>
			</div>
			<?php the_excerpt(); ?>

		<?php endwhile; ?>
		<?php if (function_exists("pagination")) {
			pagination($additional_loop->max_num_pages);
		} ?>
		<?php  else: ?>
			<div class="entry"><?php _e('Lo sentimos, no hay resultados con este término de búsqueda.'); ?></div>
		<?php endif; ?>

	</section> <!-- Fin de main -->

	<?php  get_sidebar()?>

<?php get_footer(); ?>
