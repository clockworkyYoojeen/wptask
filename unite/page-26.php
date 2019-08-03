<?php

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-md-12 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">
					<header class="page-header">
					<h1 class="page-title"><?php the_title() ?></h1>	
			</header><!-- .page-header -->
 <?php
	//include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	//if ( is_plugin_active( 'filmsplugin.php' ) ){ echo "Plugin active"; }
		do_action( 'create_films_page' );
	?>


<?php //get_sidebar(); ?>
<?php get_footer(); ?>
