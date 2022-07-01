<?php get_header(); ?>

<?php get_template_part('template-parts/heroes/hero', get_post_type()); ?>
<?php get_template_part('template-parts/section/content', get_post_type()); ?>
<?php get_template_part('template-parts/section/trip-details', get_post_type()); ?>

<?php $traningsresor = new WP_Query([
  'post_type' => 'travel_camp',
  'posts_per_page' => '3',
   'tax_query' => [[ 
    'taxonomy' => 'travel_sport_type',
    'field' => 'slug',
    'terms' => 'fotboll'
  ]],  
  ]); 
?>

<div class="album py-5 bg-light">
    <h1 class="d-flex justify-content-center mb-5">Träningsresor</h1>
    <div class="container"> 
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          
            <?php 
            if ( $traningsresor->have_posts() ) :
                while ( $traningsresor->have_posts() ) : $traningsresor->the_post(); ?>
              <div class="col">
                  <div class="card box-shadow">
                      <div class="card-body">
                          <h1><?php the_title() ?></h1>
                          <p class="card-text">	<?php the_excerpt(); ?> </p>
                          <div class="d-flex justify-content-between align-items-center">
                              <div class="btn-group">
                                <a href="<?php the_permalink();?>">    
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php endwhile; endif;?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<?php get_template_part('template-parts/section/newsletter'); ?>
<?php get_template_part('template-parts/navigation/footer'); ?>

<!-- < ?php get_footer() ?>  <- den här funkar inte? Why?-->