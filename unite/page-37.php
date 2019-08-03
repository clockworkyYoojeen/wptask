<?php

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-md-12 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">
					<header class="page-header">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</header><!-- .page-header -->
			<?php while( have_posts() ){
				the_post();
				the_content();
}?>
			

		</main><!-- #main -->

	</section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
