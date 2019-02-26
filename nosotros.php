<?php
/*Template Name: nosotros */
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
	<div class="pilares w_100 section_top_center">

		<?php if ( is_active_sidebar( 'pilares_nosotros' ) ) : ?>
		<?php dynamic_sidebar( 'pilares_nosotros' ); ?>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'valores_nosotros' ) ) : ?>
		<?php dynamic_sidebar( 'valores_nosotros' ); ?>
		<?php endif; ?>
	</div>

	<?php if ( is_active_sidebar( 'comprometidos_calidad' ) ) : ?>
	<?php dynamic_sidebar( 'comprometidos_calidad' ); ?>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'certificacion_nosotros' ) ) : ?>
	<?php dynamic_sidebar( 'certificacion_nosotros' ); ?>
	<?php endif; ?>

	<?php else : ?>
		<p><?php _e('Ups!, esta entrada no existe.'); ?></p>
	<?php endif; ?>
</section>
<section id="historia_wrapp" class="historia section_middle_center">
	<h2 class="w_100 align_center">HISTORIA</h2>
	<div class="w_80 section_top_center wrapp_history">
		<div class="slider slider-nav">
			<?php
				$name_pod_historia = "historia";
				$params_historia = array(
					'limit' => -1
				);
				$pods_historia = pods($name_pod_historia, $params_historia);

				if (0 < $pods_historia->total()) {
					while ($pods_historia->fetch()) {
						$post_id_historia = $pods_historia->display('id');
						$nombre_historia = $pods_historia->display('post_title');
						$slug_historia = $pods_historia->display('slug');
						$url_image_historia = pods_image_url ( $post_id_historia, 'medium', 0, false );
						echo '<div><a class="section_middle_center">'.$nombre_historia.'</a></div>';
					}
				}
			?>

		</div>
		<div class="slider slider-for">
			<?php
				$pods_historia2 = pods($name_pod_historia, $params_historia);

				if (0 < $pods_historia2->total()) {
					while ($pods_historia2->fetch()) {
						$post_content_historia = $pods_historia2->display('content');

						echo '<div class="section_top_center">'.$post_content_historia.'</div>';
					}
				}
			?>
		</div>
	</div>
</section>
<section id="nuestro-equipo" class="team section_top_center">
	<h2>NUESTRO EQUIPO</h2>
	<div class="w_80 section_middle_center">
		<?php if ( is_active_sidebar( 'nuestro_equipo_imagen' ) ) : ?>
		<?php dynamic_sidebar( 'nuestro_equipo_imagen' ); ?>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'nuestro_equipo_texto' ) ) : ?>
		<?php dynamic_sidebar( 'nuestro_equipo_texto' ); ?>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
?>
