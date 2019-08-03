<?php
/**
 * The Template for displaying all single posts.
 *
 * @package unite
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>
							<p>
				Жанр:
				<?php
	$termins = wp_get_post_terms( $post->ID, 'genre' );
			foreach ( $termins as $termin ) { ?>
							<span class="label label-success">
								<span class="glyphicon glyphicon-film"></span>
								<?php echo '<a href="' . get_term_link( $termin ) . '">' . $termin->name . '</a>'; ?></span>	
			<?php }
				?>

				</p>
										<p>
				Актёры:
				<?php
	$termins = wp_get_post_terms( $post->ID, 'actors' );
			foreach ( $termins as $termin ) { ?>
							<span class="label label-success">
								<span class="glyphicon glyphicon-user"></span>
								<?php echo '<a href="' . get_term_link( $termin ) . '">' . $termin->name . '</a>'; ?></span>	
			<?php }
				?>

				</p>
			<?php unite_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>