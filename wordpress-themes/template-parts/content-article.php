
<div class="container pb50">
    <div class="row">
        <div class="col-md-9 mb40">
            <article class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="post-content">
                    <h3><?php wp_title();  ?></h3>
                    <ul class="post-meta list-inline">
                        <li class="list-inline-item">
                            <i class="fa fa-user-circle-o"></i> <a href="#"><?php echo get_the_author(); ?></a>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-calendar-o"></i> <a href="#"><?php echo get_the_date(); ?></a>
                        </li>
                      </ul>
                      <p><?php echo get_the_content_feed(); 
                        
                      ?></p>
                      
                 
  
                    <form role="form">
                      <div>

                        <?php
                      if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
                        ?>

                      <div class="comments-wrapper section-inner">
                        
                        <?php comments_template();  ?>
                      </div><!-- .comments-wrapper -->
                      <?php
                      }
                      ?>
                  </div>
                    </form>
                  </div>
            </article>
                <!-- post article-->
                
          </div>
        
            </div>
        </div>
    </div>
</div>

