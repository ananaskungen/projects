
<?php $netr_query = new WP_Query([
  'post_type' => 'travel_soccer',
  'posts_per_page' => '9',
  
  ]); 
?>
<div class="album py-5 bg-light">
  <h1 class="d-flex justify-content-center mb-5">Featured Travels</h1>
    <div class="container"> 
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          
        <?php 
            if ( $netr_query->have_posts() ) :
              while ( $netr_query->have_posts() ) : $netr_query->the_post(); ?>
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