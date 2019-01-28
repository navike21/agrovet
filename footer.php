		<footer class="w_100">
			<section class="w_100 section_middle_center">
				<div class="w_80 section_middle_justify">
					<?php if ( is_active_sidebar( 'logo_footer' ) ) : ?>
					<?php dynamic_sidebar( 'logo_footer' ); ?>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer_1' ) ) : ?>
					<?php dynamic_sidebar( 'footer_1' ); ?>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'contacto_footer' ) ) : ?>
					<?php dynamic_sidebar( 'contacto_footer' ); ?>
					<?php endif; ?>
				</div>
			</section>
		</footer>
		</div> <!-- Fin de wrapper -->

		<?php wp_footer(); ?>
	</body>
</html>
