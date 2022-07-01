
<?php $trip_details = new WP_Query([
  'post_type' => 'travel_camp',
  'posts_per_page' => '6',
  'tax_query' => [[
    'taxonomy' => 'travel_sport_type',
    'field' => 'slug',
    'terms' => 'fotboll'
  ]],
  ]); 
?>
  
  <div class="album py-5 bg-light">
      <h1 class="d-flex justify-content-center mb-5">Trip Details </h1>
      <div class="container"> 
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php 
            if ( $trip_details->have_posts() ) :
                while ( $trip_details->have_posts() ) : $trip_details->the_post(); ?>

                    <!-- Three columns of text below the carousel -->
                        <div class="Col">
                            <div class="col-lg-4">
                                <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                                <h2><?php the_title(); ?></h2>
                                <p><a class="btn btn-secondary" href="<?php the_permalink(); ?>" role="button">View details »</a></p>
                            </div><!-- /.col-lg-4 -->
                        </div><!-- /.row -->
                        
                        
                        <?php endwhile; endif;?>
            </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <div class="card-body">
                            <h4 class="card-title">Reviews</h4>
                            <h5 class="card-subtitle">Overview of Review</h5>
                            <h2 class="font-medium mt-5 mb-0">25426</h2>
                            <span class="text-muted">This month we got 346 New Reviews</span>
             
                            <a href="javascript:void(0)" class="btn btn-lg btn-info waves-effect waves-light">Checkout All Reviews</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-8 border-left">
                        <div class="card-body">
                            <ul class="list-style-none">
                                <li class="mt-4">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-smile-o display-5 text-muted"></i>
                                        <div class="ml-2">
                                            <h5 class="mb-0">Positive Reviews</h5>
                                            <span class="text-muted">25547 Reviews</span></div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 47%" aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li class="mt-5">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-frown-o display-5 text-muted"></i>
                                        <div class="ml-2">
                                            <h5 class="mb-0">Negative Reviews</h5>
                                            <span class="text-muted">5547 Reviews</span></div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-orange" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                <li class="mt-5 mb-5">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-meh-o display-5 text-muted"></i>
                                        <div class="ml-2">
                                            <h5 class="mb-0">Neutral Reviews</h5>
                                            <span class="text-muted">547 Reviews</span></div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>