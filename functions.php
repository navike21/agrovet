<?php
	/**
	 * Crear nuestros menús gestionables desde el
	 * administrador de Wordpress.
	 */

	function mis_menus() {
	    register_nav_menus(
	        array(
	            'navegation' => __( 'Menú de navegación' ),
	        )
	    );
	}
	add_action( 'init', 'mis_menus' );

	//  Main Sidebar
	if( function_exists('register_sidebar')){
		register_sidebar(
			array(
				'name' => 'Main Sidebar',
				'before_widget' => '<hr>',
				'after_widget' => '',
				'before_title' => '<h3>',
				'after_title' => '</h3>',
			)
		);
	}

	/**
	 * Habilitar la opción de logo en el template
	 */
	function custom_logo() {

		add_theme_support( 'custom-logo', array(
			'height'      => 65,
			'width'       => 219,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
	}
	add_action( 'after_setup_theme', 'custom_logo' );


	/**
	 * Register ÁREA DE MENU -> FOOTER.
	 *
	 */
	function menu_footer() {

		register_sidebar( array(
			'name'          => 'Menu Footer',
			'id'            => 'footer_1',
			'before_widget' => '<div class="w_20">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="w_100">',
			'after_title'   => '</h3>',
		) );

	}
	add_action( 'widgets_init', 'menu_footer' );

	/**
	 * Register ÁREA DE DATOS DE CONTACTO -> FOOTER.
	 *
	 */
	function contacto_footer() {

		register_sidebar( array(
			'name'          => 'Datos de Contacto Footer',
			'id'            => 'contacto_footer',
			'before_widget' => '<div class="w_25">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );

	}
	add_action( 'widgets_init', 'contacto_footer' );

	/**
	 * Register Logo -> FOOTER.
	 *
	 */
	function logo_footer() {

		register_sidebar( array(
			'name'          => 'Logo footer',
			'id'            => 'logo_footer',
			'before_widget' => '<a href="'.get_option('home').'" class="w_35">',
			'after_widget'  => '</a>',
			'before_title'  => '<h3 class="hide">',
			'after_title'   => '</h3>',
		) );

	}
	add_action( 'widgets_init', 'logo_footer' );

	/**
	 * Textos de Planta en Home e Internas
	 *
	 */
	function planta_text() {

		register_sidebar( array(
			'name'          => 'Textos Planta',
			'id'            => 'planta_text',
			'before_widget' => '<div class="align_center w_80">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="w_100 align_center">',
			'after_title'   => '</h2>',
		) );

	}
	add_action( 'widgets_init', 'planta_text' );

	/**
	 * Textos de Novedades en Home e Internas
	 *
	 */
	function novedades_text() {

		register_sidebar( array(
			'name'          => 'Textos Novedades',
			'id'            => 'novedades_text',
			'before_widget' => '<div class="align_center w_80">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="w_100 align_center">',
			'after_title'   => '</h2>',
		) );

	}
	add_action( 'widgets_init', 'novedades_text' );

	/**
	 * Espacio para Slider del Home
	 *
	 */
	function slider_home() {

		register_sidebar( array(
			'name'          => 'Slider Home',
			'id'            => 'slider_home',
			'before_widget' => '<section id="slider_home" class="align_center w_100">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="hide">',
			'after_title'   => '</h2>',
		) );

	}
	add_action( 'widgets_init', 'slider_home' );

	/**
	 * Espacio para pilares en nosotros
	 *
	 */
	function pilares_nosotros() {

		register_sidebar( array(
			'name'          => 'Pilares',
			'id'            => 'pilares_nosotros',
			'before_widget' => '<section id="pilares_nosotros" class="section_top_center align_center w_100">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );

	}
	add_action( 'widgets_init', 'pilares_nosotros' );

	/**
	 * Espacio para Valores en nosotros
	 *
	 */
	function valores_nosotros() {

		register_sidebar( array(
			'name'          => 'Valores',
			'id'            => 'valores_nosotros',
			'before_widget' => '<section id="valores_nosotros" class="section_top_center align_center w_100">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );

	}
	add_action( 'widgets_init', 'valores_nosotros' );

	/**
	 * Espacio para Comprometidos con la calidad en Nosotros
	 *
	 */
	function comprometidos_calidad() {

		register_sidebar( array(
			'name'          => 'Comprometidos con la calidad',
			'id'            => 'comprometidos_calidad',
			'before_widget' => '<section id="comprometidos-con-la-calidad" class="w_100 section_top_center calidad">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="w_100 align_center">',
			'after_title'   => '</h2>',
		) );

	}
	add_action( 'widgets_init', 'comprometidos_calidad' );

	/**
	 * Espacio para Certificación en Nosotros
	 *
	 */
	function certificacion_nosotros() {

		register_sidebar( array(
			'name'          => 'Certificación',
			'id'            => 'certificacion_nosotros',
			'before_widget' => '<section id="certificacion_nosotros" class="certificacion section_top_center">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		) );

	}
	add_action( 'widgets_init', 'certificacion_nosotros' );

	/**
	 * Espacio para Texto Equipo en Nosotros
	 *
	 */
	function nuestro_equipo_imagen() {
		register_sidebar( array(
			'name'          => 'Imagen Nuestro Equipo',
			'id'            => 'nuestro_equipo_imagen',
			'before_widget' => '<div id="nuestro_equipo_imagen" class="w_50">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="hide">',
			'after_title'   => '</h2>',
		) );

	}
	add_action( 'widgets_init', 'nuestro_equipo_imagen' );

	/**
	 * Espacio para Texto Equipo en Nosotros
	 *
	 */
	function nuestro_equipo_texto() {
		register_sidebar( array(
			'name'          => 'Texto Nuestro Equipo',
			'id'            => 'nuestro_equipo_texto',
			'before_widget' => '<div id="nuestro_equipo_texto" class="texto_team w_46">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="hide">',
			'after_title'   => '</h2>',
		) );

	}
	add_action( 'widgets_init', 'nuestro_equipo_texto' );


	// Permitir comentarios encadenados
	function enable_threaded_comments(){
	    if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
	       wp_enqueue_script('comment-reply');
	    }
	}
	add_action('get_header', 'enable_threaded_comments');

	// Cargar Hojas de estilos
	function custom_css(){
	    wp_enqueue_style('bxslider', "https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css", false, '4.2.12', 'all');
	    wp_enqueue_style('bastemp', get_bloginfo('template_url')."/assets/css/bastemp.min.css", 'bxslider', '1.0', 'all');
	    wp_enqueue_style('slick1', get_bloginfo('template_url').'/assets/slick/slick.css','bastemp', '1.0', 'all');
	    wp_enqueue_style('slick2', get_bloginfo('template_url').'/assets/slick/slick-theme.css','slick1', '1.0', 'all');
	    wp_enqueue_style('styles-agrovet', get_bloginfo('template_url').'/assets/css/styles.min.css','slick2', '1.0', 'all');
	    // wp_enqueue_style('jquery-ui', get_bloginfo('template_url').'/_inc/css/jquery-ui.custom/ jquery-ui.custom.css','style-theme');
	}
	add_action('wp_print_styles', 'custom_css');

	//Cargador de Javascript
	function custom_scripts() {

		// Registramos JQUERY
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_bloginfo('template_url').'/assets/js/jquery-3.2.1.min.js', false, '3.2.1', false );
		wp_enqueue_script( 'jquery' );

		// Registramos Bxslider
		wp_deregister_script( 'bxslider' );
		wp_register_script( 'bxslider', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', false, '4.2.12', false );
		wp_enqueue_script( 'bxslider' );

		// Registramos Slick
		wp_deregister_script( 'slick' );
		wp_register_script( 'slick', get_bloginfo('template_url').'/assets/slick/slick.js', false, '1.0', false );
		wp_enqueue_script( 'slick' );

		// Registramos Bastemp
		wp_deregister_script( 'bastemp' );
		wp_register_script( 'bastemp', get_bloginfo('template_url').'/assets/js/bastemp.min.js', false, '1.0', false );
		wp_enqueue_script( 'bastemp' );

		// Registramos Bastemp
		wp_deregister_script( 'agrovet-js' );
		wp_register_script( 'agrovet-js', get_bloginfo('template_url').'/assets/js/agrovet.min.js', false, '1.0', false );
		wp_enqueue_script( 'agrovet-js' );

		// //REGISTRAMOS BOOTSTRAP
		// wp_deregister_script( 'bootstrap' );
		// wp_register_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', false );
		// wp_enqueue_script( 'bootstrap' );

	}
	add_action( 'wp_enqueue_scripts', 'custom_scripts' );


	//Feature Image
	add_theme_support( 'post-thumbnails' );
	the_post_thumbnail( 'single-post-thumbnail' );

?>
