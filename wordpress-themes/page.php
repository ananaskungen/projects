<?php get_header(); ?>
<div class="">
<?php get_template_part('template-parts/heroes/hero', get_post_type()); ?>
<?php get_template_part('template-parts/section/content'); ?>	
<?php get_template_part('template-parts/section/featured-section'); ?>
<?php get_template_part('template-parts/section/newsletter'); ?>	
<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	
			 <?php get_template_part('template-parts/section/hero-page', get_post_type()); ?>
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
			
				
				<?php the_excerpt(); ?>
			</article>
		<?php
		endwhile;

		if ( is_single() ) :
			previous_post_link();
			next_post_link();
		endif;
		else :
			_e( 'Sorry, no posts matched your criteria.', 'textdomain' );
		endif;
	?> 

</div>

<?php get_footer(); ?>
