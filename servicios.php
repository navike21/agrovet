<?php
/*Template Name: Servicios */
get_header();
$name_pod_servicios = "servicio";
$params_servicios = array(
	'limit' => -1
);
$pods_servicios = pods($name_pod_servicios, $params_servicios);
?>
<section class="section_top_right w_100 banner">
	<!-- <img src="images/servicios.png" alt="About" width="100%"> -->
	<?php
		// the_post_thumbnail();
		$url_img_destacada = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
		echo '<img src="'.$url_img_destacada.'" alt="servicios" width="100%">';
	?>
</section>
<section class="triangle section_top_center servicios_wrapp">
	<h2 class="w_100 align_center"><?php the_title();?></h2>

	<?php
		$divisor = 2;
		if (0 < $pods_servicios->total()) {
			while ($pods_servicios->fetch()) {
				$post_id_servicios = $pods_servicios->display('id');
				$nombre_servicio = $pods_servicios->display('post_title');
				$slug_servicio = $pods_servicios->display('slug');
				$url_image_servicios = pods_image_url ( $post_id_servicios, 'medium', 0, false );
				if ($divisor % 2 == 0) {
					echo '	<article id="'.$slug_servicio.'" class="w_80 section_middle_center">
								<section class="w_50 section_middle_center fotos_fondo">';
					echo '			<img src="'.$url_image_servicios.'" width="100%" height="auto" alt="'.$nombre_servicio.'" />
								</section>
								<section class="w_50 section_middle_center fondo_color">
									<div class="w_60 align_left">';
					echo '				<h3>'.$nombre_servicio.'</h3>';
					echo 				$pods_servicios->display( 'content' );
					echo '			</div>
								</section>';
					echo '	</article>';
				}
				else{
					echo '	<article id="'.$slug_servicio.'" class="w_80 section_middle_center">
								<section class="w_50 section_middle_center">';
					echo '			<div class="w_60 align_right">';
					echo '				<h3>'.$nombre_servicio.'</h3>';
					echo 				$pods_servicios->display( 'content' );
					echo '			</div>
								</section>
								<section class="w_50 section_middle_center fondo_color fotos_fondo">
									<img src="'.$url_image_servicios.'" width="100%" height="auto" alt="'.$nombre_servicio.'" />
								</section>';
					echo '	</article>';
				}
				$divisor ++;
			}
		}
	?>

</section>
<?php
	get_footer();
?>
