<?php
/**
* 404 Template
*
* @package dash
*/ ?>

<?php get_header(); ?>

<section id="not-found" role="main">

	<?php
	$args = array (
		'p'         => get_option('not_found_page'),
		'post_type' => 'page'
	);

	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) : 

		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			
			<article id="post-0" class="post not-found">

				<header class="post-header">

					<?php the_title( '<h1 class="post-title">', '</h1>', true ); ?>
				
				</header>

				<section class="post-content">
					
					<?php the_content(); ?>

				</section>

			</article>
								
		<?php endwhile; ?>
			
	<?php else : ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

	<?php endif; ?>

</section>

<?php get_footer(); ?>