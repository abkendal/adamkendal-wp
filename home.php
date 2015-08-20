<?php 
// Template Name: Home Page
get_header();  ?>
<?php get_template_part('jumbotron'); ?>
<?php get_template_part('about'); ?>
<div class="portfolio">
  <div class="container">

    <div class="content portfolio-content">


      <!-- Start of custom loop -->
      <?php  
        $portfolioArgs = array(
          'post_type' => 'portfolio',
          'posts_per_page' => 3,
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
                <h3><?php the_title();?></h3>
                <p><?php the_field('project_name'); ?></p>
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
                <?php the_content(); ?>
                <a href="<?php the_field('live_url') ?>">
                  <div class="view-live">
                    VIEW IT LIVE
                  </div>
                </a> 
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

<?php get_footer(); ?>