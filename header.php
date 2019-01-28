<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php bloginfo('name'); ?></title>

		<!-- Definir viewport para dispositivos web móviles -->
		<meta name="viewport" content="width=device-width, minimum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />

		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
		<link rel="stylesheet" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>

	</head>
	<body>
		<div class="wrapper">
			<header id="navbar" class="w_100 section_middle_center">
				<nav class="w_80 section_middle_justify">
					<div id="logo" class="logo" data-maxwidth="240">
						<?php
						if ( function_exists( 'the_custom_logo' ) ) {
							the_custom_logo();
						}
						?>
					</div>
		            <?php wp_nav_menu( array( 'theme_location' => 'navegation', 'menu_class' => 'section_middle_center' ) ); ?>
				</nav>
			</header>
