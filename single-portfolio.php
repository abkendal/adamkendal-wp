<?php get_header(); ?>

<div class="main">
  <div class="container">

    <div class="content">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
        <h3><?php the_field('project_name') ?></h3>
        <ul>
          <?php while(has_sub_field('technologies')) {
          ?>
            <li><?php the_sub_field('technology'); ?></li>
          <?php
          } //End while
          ?>
        </ul>
        <div class="portfolio-items"><pre>
          <?php while(has_sub_field('images')) {
            ?>
            <div class="portfolio-image">
              <?php 
                $image = get_sub_field('image');
               ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
              <p><?php the_sub_field('caption'); ?></p>
              
            </div>



            <?php
            } //end while
            ?>
            </pre>
        </div>
      <?php endwhile; // end of the loop. ?>

    </div> <!-- /.content -->

    <?php // get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>