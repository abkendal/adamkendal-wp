<?php query_posts('p=25'); ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="about">
			<div class="container">
				<?php the_content(); ?>		
			</div>
		</div>
	<?php endwhile;?>