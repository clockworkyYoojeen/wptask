<?php
/*
  Plugin Name:  Films Plugin
  Description:  Simple Test Plugin
  Version:      20160911
  Author:       Yoojeen
 */

defined( 'ABSPATH' ) or die( 'No monkey business!!!' ); // защита от запуска файла напрямую в строке браузера

function get_films_page() {
				$args = array( 'post_type' => 'films',
						  'posts_per_page' => 6,
						  'paged' => get_query_var('paged', 1), 
						 );
			$films = new WP_Query( $args );   ?>
		<?php if ( $films->have_posts() ) : ?>
			<?php
				while ( $films->have_posts() ) : $films->the_post();
			global $post;
			$id = $post->ID; ?>

			<div class="col-sm-4 text-center film-container">
			 <a href="<?php the_permalink(); ?>">; 
				<?php the_post_thumbnail(); ?>
				</a>
				<div class="film_desc">
				<?php echo wp_trim_words(get_the_content(), 8); ?>
				</div>
				<p><a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i> далее</a></p>
				<div class="film_meta">
									<p>Стоимость: <span class="label label-success"><?php echo get_post_meta( $id, 'film_price', true ) ?></span></p>
				<p>Год выхода: <span class="label label-success"><?php echo get_post_meta( $id, 'film_date', true ) ?></span></p>
				<p>Страна:
				 <?php
	$termins = wp_get_post_terms( $id, 'country' );
			foreach ( $termins as $termin ) { ?>
							<span class="label label-success">
								<span class="glyphicon glyphicon-flag"></span>
								<?php echo '<a href="' . get_term_link( $termin ) . '">' . $termin->name . '</a>'; ?></span>	
			<?php }
				?>
				</p>
				<p>
				Жанр:
				<?php
	$termins = wp_get_post_terms( $id, 'genre' );
			foreach ( $termins as $termin ) { ?>
							<span class="label label-success">
								<span class="glyphicon glyphicon-film"></span>
								<?php echo '<a href="' . get_term_link( $termin ) . '">' . $termin->name . '</a>'; ?></span>	
			<?php }
				?>

				</p>
				</div>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->

	</section><!-- #primary -->
<br>
		<div>					<?php echo paginate_links(array(
				'total'=> $films->max_num_pages
)); ?></div>
<?php
}
add_action( 'create_films_page', 'get_films_page'  );