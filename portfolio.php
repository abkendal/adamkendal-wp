<div class="portfolio clearfix">
  <div class="container clearfix">

    <div class="content portfolio-content  clearfix">


      <!-- Start of custom loop -->
      <?php  
        $portfolioArgs = array(
          'post_type' => 'portfolio',
          // 'posts_per_page' => 10,
          // 'orderby' => 'title',
          // 'order' => 'ASC'
        ); 

        // Create a new WP_Query and pass it in the arguments from above the new keyword here is
        // used to create a new object or query and we store it in the variable portfolioQuery
        $portfolioQuery = new WP_Query($portfolioArgs);
        //We go through and start our loop. 
        // First we check if there are posts
        if($portfolioQuery -> have_posts()) {
          while($portfolioQuery->have_posts()) {
            $portfolioQuery ->the_post();
            ?>
              <!-- Item content -->
              <div class="portfolio-item">
                <div class="portfolio-item-sec portfolio-item-sec1">
                  <div class="portfolio-item-title">
                    <h3><?php the_title();?></h3>
                  </div>
                  <h4><?php the_field('project_name'); ?></h4>
                  <ul>
                    <?php 
                      while( has_sub_field('technologies') ) { 
                    ?>
                      <li>
                        <?php the_sub_field('technology') ?>
                      </li>
                    <?php 
                      } 
                    ?>
                  </ul>
                </div>
                <div class="portfolio-item-sec portfolio-item-sec2">
                  <?php the_content(); ?>
                  <a href="<?php the_field('live_url') ?>">
                    <div class="view-live">
                      VIEW IT LIVE
                    </div>
                  </a> 
                </div>
                <div class="portfolio-item-sec portfolio-item-sec3">
                  <?php 
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail('full');
                    }  
                  ?>
                </div>
              </div>
              <!-- End of Item content -->
            <?php
          } //end of loop html

        }
      // Need to add this to the end of your custom query so that the original loop can reset itself.
      wp_reset_postdata();
      ?> 
      <!-- End of Custom loop -->
    </div> <!-- /.content -->

    <?php //get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->