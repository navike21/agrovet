<?php get_header(); ?>
	<!-- <section class="section_middle_right w_100 slide1">
		<div class="align_left caption" data-minwidth="300">
			TECNOLOGÍA<br />DE AVANZADA
		</div>
	</section> -->

	<?php if ( is_active_sidebar( 'slider_home' ) ) : ?>
	<?php dynamic_sidebar( 'slider_home' ); ?>
	<?php endif; ?>

	<section class="triangle section_top_center">
		<h2 class="w_100 align_center">PRODUCTOS</h2>

		<?php
			$name_pod_producto = "categoria-producto";
			$params_producto = array(
				'limit' => -1,
				'orderby' => 'date ASC'
			);
			$pods_producto = pods($name_pod_producto, $params_producto);
			if (0 < $pods_producto->total()) {
				echo '<div class="w_80 section_top_justify productos">';
				$variante = 2;
				while ($pods_producto->fetch()) {
					$post_id_producto = $pods_producto->display('id');
					$nombre_producto = $pods_producto->display('name');
					$slug_producto = $pods_producto->display('slug');
					$url_image_producto = pods_image_url ( $post_id_producto, 'medium', 0, false );
					if ($variante % 2 == 0) {
						$posicion = "abajo";
					}
					else{
						$posicion = "arriba";
					}
					$variante ++;
					echo '<figure class="section_top_center w_20" data-minwidth="250">';
					echo '	<img src="'.$url_image_producto.'" alt="'.$nombre_producto.'" width="auto" height="100%">';
					echo '	<figcaption class="align_center '.$posicion.'">';
					echo 		strtoupper($nombre_producto);

					// LISTAR SUB CATEGORIAS SEGUN ESTEN REGISTRADAS EN CADA CATEGORÍA.
					$sub_categoria_productos = pods_field ( $name_pod_producto, $post_id_producto, "sub_categoria" );
					$total_sub_categoria = count($sub_categoria_productos);
					if ($sub_categoria_productos[0]["guid"] != "") {
					echo '		<ul class="sub_categorias w_100">';
						for ($e=0; $e < $total_sub_categoria; $e++) {
							$id_sub_categoria = $sub_categoria_productos[$e]["ID"];
							$nombre_sub_categoria = $sub_categoria_productos[$e]["post_title"];
							$slug_sub_categoria = $sub_categoria_productos[$e]["post_name"];
					// nombre categoría / id categoría / nombre sub categoría / id sub categoría
					echo '			<li><a href="/productos/?'.$slug_producto.'='.$post_id_producto.'='.$slug_sub_categoria.'='.$id_sub_categoria.'">
										'.strtoupper($nombre_sub_categoria).'
									</a></li>';
						}
					echo '		</ul>';
					}
					echo '	</figcaption>';
					echo '</figure>';
				}
				echo '</div>';
			}
		?>
	</section>

	<section class="w_100 servicios section_top_center">
		<h2 class="w_100 align_center">SERVICIOS</h2>
		<div class="w_80">
			<ul id="servicio_home">
			<?php
				$name_pod_servicios = "servicio";
				$params_servicios = array(
					'limit' => -1
				);
				$pods_servicios = pods($name_pod_servicios, $params_servicios);

				if (0 < $pods_servicios->total()) {
					while ($pods_servicios->fetch()) {
						$post_id_servicios = $pods_servicios->display('id');
						$nombre_servicio = $pods_servicios->display('post_title');
						$slug_servicio = $pods_servicios->display('slug');
						$url_image_servicios = pods_image_url ( $post_id_servicios, 'medium', 0, false );
				echo '<li>';
				echo '	<a class="align_center w_100" href="'.get_home_url()."/servicios/#".$slug_servicio.'">';
				echo '		<img src="'.$url_image_servicios.'" width="100%" height="auto" alt="'.$nombre_servicio.'" />';
				echo 		'<p class="w_100 align_center">'.$nombre_servicio.'</p>';
				echo '	</a>';
				echo '</li>';
					}
				}
			?>
			</ul>
		</div>
	</section>

	<section id="planta" class="w_100 section_top_center plantas">
		<?php if ( is_active_sidebar( 'planta_text' ) ) : ?>
		<?php dynamic_sidebar( 'planta_text' ); ?>
		<?php endif; ?>
		<div id="wrapp_plantas" class="w_80">
			<ul id="plantas">
			<?php
				$name_pod = "planta";
				$params = array(
					'limit' => -1
				);
				$pods = pods($name_pod, $params);

				if (0 < $pods->total()) {
					while ($pods->fetch()) {
						$post_id = $pods->display('id');
				echo '	<li>
							<div class="w_100 section_middle_justify">';
				echo '			<div class="w_50">';
				echo 				get_the_post_thumbnail ($post_id, medium_large);
				echo '			</div>';
				echo '			<div class="w_47">
									<strong>'.$pods->display('post_title').'</strong>
									<div>'.$pods->display('content').'</div>
								</div>
							</div>
						</li>';
					}
				}
			?>
			</ul>
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
	<?php  //get_sidebar()?>

<?php get_footer(); ?>
