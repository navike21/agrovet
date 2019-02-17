<?php
	/*Template Name: Productos */
get_header();
$url_actual = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";;
$val_hash_url = explode("?", $url_actual);
$val_hash = explode("=", $val_hash_url[1]);

$slug_url_cat = $val_hash[0];
$slug_url_cat_id = $val_hash[1];
$slug_url_sub_cat = $val_hash[2];
$slug_url_sub_cat_id = $val_hash[3];
$slug_url_grupo_prod = $val_hash[4];
$slug_url_grupo_prod_id = $val_hash[5];

if ($slug_url_grupo_prod_id != "") {
	$url_image_grupo_select = pods_image_url ( $slug_url_grupo_prod_id, 'null', 0, false );
}

?>
<section id="productos" class="section_middle_center w_100 banner">
	<?php
		if ($slug_url_grupo_prod_id == "") {
			// IMAGEN POR DEFECTO DEL TEMPLATE
			$url_img_destacada = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
			echo '<img src="'.$url_img_destacada.'" alt="productos" width="100%">';
		}
		else{
			// IMAGEN POR DEFECTO DEL GRUPO SELECCIONADO
			echo '<img src="'.$url_image_grupo_select.'" alt="'.$slug_url_grupo_prod.'" width="100%">';
		}
	?>
</section>
<section class="triangle section_top_center products">
<?php if ( have_posts() ) : the_post(); ?>
	<h2><?php the_title();?></h2>
	<div class="section_top_center w_80 grupo_producto">
	<!-- Listado de Grupos de Categorías -->
	<?php
		// ESTAMOS EN LA SECCIÓN PRODUCTOS O sub categorías.
		if ($slug_url_grupo_prod_id == "") {
			if ($slug_url_cat != "") {
				$name_pod_grupo_producto = "grupo-de-producto";
				$params_grupo_producto = array(
					'limit' => -1,
					'orderby' => 'date ASC'
				);
				$pods_grupo_producto = pods($name_pod_grupo_producto, $params_grupo_producto);
				if (0 < $pods_grupo_producto->total()) {
					while ($pods_grupo_producto->fetch()) {
						$post_id_grupo_producto = $pods_grupo_producto->display('id');
						$nombre_grupo_producto = $pods_grupo_producto->display('name');
						$slug_grupo_producto = $pods_grupo_producto->display('slug');
						$color_grupo_producto = $pods_grupo_producto->display('color_del_grupo');
						$url_image_grupo_producto = pods_image_url ( $post_id_grupo_producto, 'medium', 0, false );
						$galeria_img = pods_field ( $name_pod_grupo_producto, $slug_grupo_producto, "sub_categoria" );
						// Nombre de Sub Categoría relacionada
						$galeria_img["post_name"];

						if ($galeria_img["post_name"] == $slug_url_sub_cat) {
							echo '<a href="/productos/?'.$slug_url_cat.'='.$slug_url_cat_id.'='.$slug_url_sub_cat.'='.$slug_url_sub_cat_id.'='.$slug_grupo_producto.'='.$post_id_grupo_producto.'" class="w_32" data-minwidth="250">';
							echo '	<figure>';
							echo '		<figcaption style="background-color:'.$color_grupo_producto.';">'.strtoupper($nombre_grupo_producto).'</figcaption>';
							echo '			<img src="'.$url_image_grupo_producto.'" width="100%" height="auto" alt="'.$nombre_grupo_producto.'" />';
							echo '		</figcaption>';
							echo '	</figure>';
							echo '</a>';
						}
					}
				}
			}
			// EN CASO ESTUVIERA LIBRE SIN DATOS EL URL
			else{
				$name_pod_producto = "categoria-producto";
				$params_producto = array(
					'limit' => -1,
					'orderby' => 'date ASC'
				);
				$pods_producto = pods($name_pod_producto, $params_producto);
				if (0 < $pods_producto->total()) {
					echo '<div class="w_100 section_top_center productos">';
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
						echo '<figure class="section_top_center w_20" data-minwidth="190">';
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
							}
		}
		// ESTAMOS EN LOS PRODUCTOS EN DETALLE
		else{
			$name_pod_grupo_select = "grupo-de-producto";
			$params_grupo_select = array(
				'limit' => 1,
				'where' => 'id ='.$slug_url_grupo_prod_id,
				'orderby' => 'date ASC'
			);
			$pods_grupo_select = pods($name_pod_grupo_select, $params_grupo_select);
			if (0 < $pods_grupo_select->total()) {
			echo '<div class="w_100 section_top_justify">';
				echo '<section id="listado_productos" class="section_top_center w_40">';
					while ($pods_grupo_select->fetch()) {
						$nombre_grupo_select = $pods_grupo_select->display('name');
						$content_grupo_select = $pods_grupo_select->display('content');
						$color_grupo_select = $pods_grupo_select->display('color_del_grupo');

						echo '<h1 class="w_99" style="background-color:'.$color_grupo_select.';">'.$nombre_grupo_select.'</h1>';
						echo '<div class="w_98">'.$content_grupo_select.'</div>';

						$valor_GRUPO = 0;

						// GRUPOS DE LISTA DE PRODUCTOS.
						$nombre_pod_grupo_lista_producto = "grupo-detalle-producto";
						$params_pod_grupo_lista_producto = array(
							'limit' => -1
						);
						$activo_para_detalle = "";
						$pods_lista_producto = pods($nombre_pod_grupo_lista_producto, $params_pod_grupo_lista_producto);
						echo '<div id="lista_producto" class="w_98">';
							if (0 < $pods_lista_producto->total()) {
								$active_lista_productos = 1;
								$active_productos = 1;
								while ($pods_lista_producto->fetch()) {
									$grupo_seleccionado_lista_producto = $pods_lista_producto->display('grupo_producto');
									$id_lista_producto = $pods_lista_producto->display('id');
									$nombre_lista_producto = $pods_lista_producto->display('name');
									$slug_lista_producto = $pods_lista_producto->display('slug');
									$url_lista_producto = $pods_lista_producto->display('imagen_destacada');


									if ($grupo_seleccionado_lista_producto == $nombre_grupo_select) {
										$valor_GRUPO ++;
										echo '<div><strong>'.$nombre_lista_producto.'</strong></div>';
										// LISTADO DE PRODUCTOS AGRUPADOS.
										$nombre_pod_producto = "producto";
										$params_pod_producto = array(
											'limit' => -1,
											'orderby' => 'date ASC'
										);
										$pods_producto = pods($nombre_pod_producto, $params_pod_producto);
										if (0 < $pods_producto->total()) {

											echo '<ul class="lista_producto w_98">';
											while ($pods_producto->fetch()) {
												$id_producto_lista = $pods_producto->display('id');
												$nombre_producto_lista = $pods_producto->display('name');
												$slug_producto_lista = $pods_producto->display('slug');
												$texto_siglas_producto_lista = $pods_producto->display('texto_siglas');
												$foto_animal_producto_lista = $pods_producto->display('foto_animal');
												$grupo_detalle_producto = pods_field($nombre_pod_producto, $id_producto_lista, 'grupo-detalle-producto');
												// echo '<pre>';
												// print_r($grupo_detalle_producto);
												// echo '</pre>';
												$grupo_detalle_producto[0]["slug"];
												if ($slug_lista_producto == $grupo_detalle_producto[0]["slug"]) {
													// echo $foto_animal_producto_lista2 = pods_field($nombre_pod_producto, $id_producto_lista, 'foto_animal');

													//CAMPOS RELACIONADOS
													$categoria_lista = pods_field($nombre_pod_producto, $id_producto_lista, 'cetegoria-de-producto');
													$grupo_lista = pods_field($nombre_pod_producto, $id_producto_lista, 'grupo_producto');
													if ($categoria_lista["ID"] == $slug_url_cat_id && $grupo_lista["ID"] == $slug_url_grupo_prod_id) {
														if ($active_productos == 1) {
															$class_active = "producto_activado activar_pro";
															$active_productos ++;
															$activo_para_detalle = $id_producto_lista.$slug_producto_lista;
														}
														else{
															$class_active = "";
														}
														echo '<li data-foto_animal="'.$url_lista_producto.'" data-detalle="'.$id_producto_lista.$slug_producto_lista.'" class="w_100 section_top_left '.$class_active.'"><span class="w_50">'.$nombre_producto_lista.'</span><span class="w_50">('.$texto_siglas_producto_lista.')</span></li>';
													}
												}

											}
											echo '</ul>';
										}
									}
									// AQUI ME QUEDÉ
								}
							}
							// $valor_GRUPO;
							if ($valor_GRUPO == 0) {
								$active_productos2 = 1;
								// LISTADO DE PRODUCTOS SIN AGRUPAR.
								$nombre_pod_producto = "producto";
								$params_pod_producto = array(
									'limit' => -1,
									'orderby' => 'date ASC'
								);
								$pods_producto = pods($nombre_pod_producto, $params_pod_producto);
								if (0 < $pods_producto->total()) {
									echo '<ul class="lista_producto w_98">';
									while ($pods_producto->fetch()) {
										$id_producto_lista = $pods_producto->display('id');
										$nombre_producto_lista = $pods_producto->display('name');
										$slug_producto_lista = $pods_producto->display('slug');
										$texto_siglas_producto_lista = $pods_producto->display('texto_siglas');
										$foto_animal_producto_lista = $pods_producto->display('foto_animal');

										//CAMPOS RELACIONADOS
										$categoria_lista = pods_field($nombre_pod_producto, $id_producto_lista, 'cetegoria-de-producto');
										$grupo_lista = pods_field($nombre_pod_producto, $id_producto_lista, 'grupo_producto');
										if ($categoria_lista["ID"] == $slug_url_cat_id && $grupo_lista["ID"] == $slug_url_grupo_prod_id) {
											if ($active_productos2 == 1) {
												$class_active2 = "producto_activado activar_pro";
												$active_productos2 ++;
												$activo_para_detalle = $id_producto_lista.$slug_producto_lista;
											}
											else{
												$class_active2 = "";
											}
											echo '<li data-foto_animal="'.$foto_animal_producto_lista.'" data-detalle="'.$id_producto_lista.$slug_producto_lista.'" class="w_100 section_top_left '.$class_active2.'"><span class="w_50">'.$nombre_producto_lista.'</span><span class="w_50">('.$texto_siglas_producto_lista.')</span></li>';
										}
									}
									echo '</ul>';
								}
							}
						echo '</div>';
					}
				echo '</section>';
				echo '<section id="detalle_producto_seleccionado" class="w_50 section_top_right">
						<a class="close_modal"><img src="'.get_template_directory_uri().'/assets/images/close.svg" width="100%" height="auto" /></a>';
					$nombre_pod_producto = "producto";
					$params_pod_producto = array(
						'limit' => -1,
						'orderby' => 'date ASC'
					);
					$pods_producto = pods($nombre_pod_producto, $params_pod_producto);
					if (0 < $pods_producto->total()) {
						// $active_productos_sub = 1;
						echo '<ul class="detalle_producto w_100">';
						while ($pods_producto->fetch()) {
							$id_producto_lista = $pods_producto->display('id');
							$nombre_producto_lista = $pods_producto->display('name');
							$content_producto_lista = $pods_producto->display('content');
							$slug_producto_lista = $pods_producto->display('slug');
							//CAMPOS RELACIONADOS
							$categoria_lista = pods_field($nombre_pod_producto, $id_producto_lista, 'cetegoria-de-producto');
							$grupo_lista = pods_field($nombre_pod_producto, $id_producto_lista, 'grupo_producto');

							$url_image_producto_lista = pods_image_url ( $id_producto_lista, 'medium', 0, false );
							if ($categoria_lista["ID"] == $slug_url_cat_id && $grupo_lista["ID"] == $slug_url_grupo_prod_id) {
								if ($activo_para_detalle == $id_producto_lista.$slug_producto_lista) {
									$class_active_sub = "producto_activado activar_pro";
									// $active_productos_sub ++;
								}
								else{
									$class_active_sub = "";
								}
								echo '<li id="'.$id_producto_lista.$slug_producto_lista.'" class="w_100 section_top_left '.$class_active_sub.'">
									<img src="'.$url_image_producto_lista.'" width="90%" />
									<section>
										<h3 class="w_100"><span>'.$nombre_producto_lista.'</span></h3>
										'.$content_producto_lista.'
									</section>
								</li>';
							}
						}
						echo '</ul>';
					}
				echo '</section>';
			echo '</div>';
			}

			// Grupos y sub categorías.
			$name_pod_grupo_producto = "grupo-de-producto";
			$params_grupo_producto = array(
				'limit' => -1,
				'orderby' => 'date ASC'
			);
			$pods_grupo_producto = pods($name_pod_grupo_producto, $params_grupo_producto);
			if (0 < $pods_grupo_producto->total()) {
				echo '<div id="product_group_detalle_active" class="w_100 section_top_justify">';
				while ($pods_grupo_producto->fetch()) {
					$post_id_grupo_producto = $pods_grupo_producto->display('id');
					$nombre_grupo_producto = $pods_grupo_producto->display('name');
					$slug_grupo_producto = $pods_grupo_producto->display('slug');
					$color_grupo_producto = $pods_grupo_producto->display('color_del_grupo');
					$url_image_grupo_producto = pods_image_url ( $post_id_grupo_producto, 'medium', 0, false );
					$galeria_img = pods_field ( $name_pod_grupo_producto, $slug_grupo_producto, "sub_categoria" );
					if ($slug_url_grupo_prod_id == $post_id_grupo_producto) {
						$activo_class = "active_groups";
					}
					else{
						$activo_class = "";
					}
					// Nombre de Sub Categoría relacionada
					$galeria_img["post_name"];
					if ($galeria_img["post_name"] == $slug_url_sub_cat) {
						echo '<a href="/productos/?'.$slug_url_cat.'='.$slug_url_cat_id.'='.$slug_url_sub_cat.'='.$slug_url_sub_cat_id.'='.$slug_grupo_producto.'='.$post_id_grupo_producto.'" class="w_32 '.$activo_class.'" data-minwidth="250">';
						echo '	<figure>';
						echo '		<figcaption style="background-color:'.$color_grupo_producto.';">'.strtoupper($nombre_grupo_producto).'</figcaption>';
						echo '	</figure>';
						echo '</a>';
					}
				}
				echo '</div>';
			}
		}
	?>
	</div>
<?php else : ?>
	<p><?php _e('Ups!, esta entrada no existe.'); ?></p>
<?php endif; ?>
<div class="overflow"></div>
</section>
<?php
get_footer();
?>
