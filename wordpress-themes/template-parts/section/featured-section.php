<?php $wcm_travels = new WP_Query([
  'post_type' => 'travel_camp',
  'posts_per_page' => '3',
  'tax_query' => [[
    'taxonomy' => 'travel_sport_type',
    'field' => 'slug',
    'terms' => 'ishockey'
  ]],
  ]); 
?>
<div class="album py-5 bg-light">
  <h1 class="d-flex justify-content-center mb-5">Featured Section</h1>
    <div class="container"> 
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          
        <?php 
            if ( $wcm_travels->have_posts() ) :
              while ( $wcm_travels->have_posts() ) : $wcm_travels->the_post(); ?>
              <div class="col">
                <div class="card box-shadow">
                  
                    <div class="card-body">
                        <h1><?php the_title() ?></h1>
                        <p class="card-text">	<?php the_excerpt(); ?> </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-secondary">View</a>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
                                        
        <?php endwhile; endif;?>
        </div>
    </div>
</div>