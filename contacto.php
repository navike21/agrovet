<?php
/*Template Name: contacto */
get_header();
?>
<section id="quienes-somos" class="section_top_right w_100 banner">
	<?php
		$url_img_destacada = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
		echo '<img src="'.$url_img_destacada.'" alt="nosotros" width="100%">';
	?>
</section>
<section class="triangle section_top_center about">
	<?php if ( have_posts() ) : the_post(); ?>
	<h2><?php the_title();?></h2>
	<?php the_content();?>
	<?php else : ?>
		<p><?php _e('Ups!, esta entrada no existe.'); ?></p>
	<?php endif; ?>
</section>
<?php
get_footer();
?>
