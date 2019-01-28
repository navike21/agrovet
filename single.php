<?php get_header(); ?>
<?php
	global $post;
	$post_slug=$post->post_name;

	$nombre_pod = "novedades";

	$galeria_img = pods_field ( $nombre_pod, $post_slug, "galeria" );
	$total = count($galeria_img);

	if ($galeria_img[0]["guid"] != "") { // Mostrar ancho al 100% si No hay imagenes y si las hay colocar el la galería
		$w_total = "w_48";
	}
	else{
		$w_total = "w_100";
	}
?>
<section class="w_100 section_top_center novedades_wrapp">
	<div class="w_80">
		<?php if ( have_posts() ) : the_post(); ?>
		<h2 class="w_30">
			<?php the_title();?>
		</h2>
		<div class="w_100 section_top_justify">
			<article class="<?php echo $w_total;?>">
				<?php the_content();?>
			</article>
			<?php
				if ($galeria_img[0]["guid"] != "") {
					echo '
					<div id="novedades_wrapp_content" class="w_45">
						<ul id="novedades">';
					for ($i=0; $i < $total; $i++) {
						$legenda = $galeria_img[$i]["post_content"];
						$urlimg = $galeria_img[$i]["guid"];
						$title_img = $galeria_img[$i]["post_title"];
						echo '<li>';
						echo '	<img src="'.$urlimg.'" alt="'.$title_img.'" width="100%">';
						echo '	<div class="w_95 align_center">'.$legenda.'</div>';
						echo '</li>';
					}
					echo '</ul>
					</div>';
				}
				// echo "<pre>";
				// print_r($galeria_img);
				// echo "</pre>";
			?>

		</div>
		<?php else : ?>
			<p><?php _e('Ups!, esta entrada no existe.'); ?></p>
		<?php endif; ?>
	</div>
</section>

<section class="w_100 novedades section_top_center">
	<div class="w_100 section_top_center">
		<?php if ( is_active_sidebar( 'novedades_text' ) ) : ?>
		<?php dynamic_sidebar( 'novedades_text' ); ?>
		<?php endif; ?>
	</div>
	<div class="w_80 section_top_center">
		<ul id="novedades_home" class="w_100">
		<?php
			$name_pod_novedades = "novedades";
			$params_novedades = array(
				'limit' 	=> 3,
				'orderby' 	=> 'date DESC'
			);
			$pods_novedades = pods($name_pod_novedades, $params_novedades);

			if (0 < $pods_novedades->total()) {
				while ($pods_novedades->fetch()) {
					$post_id_novedades = $pods_novedades->display('id');
					$nombre_novedad = $pods_novedades->display('post_title');
					$extracto_novedad = $pods_novedades->display('excerpt');
					$url_image_novedades = pods_image_url ( $post_id_novedades, 'medium', 0, false );
			echo '<li>';
			echo '	<a class="section_middle_center w_100 novedad_home" href="'.$pods_novedades->display('permalink').'">
						<figure class="w_97">';
			echo '			<img src="'.$url_image_novedades.'" width="100%" height="auto" alt="'.$nombre_novedad.'" />
							<figcaption class="section_middle_center">
								<h3 class="w_100">'.$nombre_novedad.'</h3>';
			echo 				'<div>'.$extracto_novedad.'</div>';
			echo '			</figcaption>
						</figure>
					</a>
				</li>';
				}
			}
		?>
		</ul>
	</div>
</section>

<?php get_footer(); ?>
