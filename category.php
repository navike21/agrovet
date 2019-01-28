<?php $post = $posts[0];  ?>
	<?php  if (is_category()) { ?>
	<?php } elseif( is_tag() ) { ?>
		<h2>Etiqueta &amp;amp;amp;#8216;<?php single_tag_title(); ?>&amp;amp;amp;#8217;</h2>
	<?php } elseif (is_day()) { ?>
		<h2>Archivo para <?php the_time('F jS Y'); ?>:</h2>
	<?php  } elseif (is_month()) { ?><h2>Archivo para <?php the_time('F, Y'); ?>:</h2>
	<?php } elseif (is_year()) { ?>
		<h2>Archivo para <?php the_time('Y'); ?>:</h2>
	<?php /} elseif (is_author()) { ?>
		<h2>Archivo del autor </h2>
	<?php } elseif (isset($_GET['paged']) &amp;amp;amp;&amp;amp;amp; !empty($_GET['paged'])) { ?>
		<h2>Archivos del blog</h2>
<?php } ?>
