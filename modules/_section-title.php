<div class="row">
	
	<?php

		// if has a date
		if(get_field('section-title__date')) { ?>
			<p class="section-title__date"><?php the_field('section-title__date'); ?></p>
		<?php }

		// show date on single.php
		if(is_single() ) { 
			$posts = get_posts(array('numberposts'=>-1)); ?>
			
			<p class="section-title__date"><?php echo get_the_time('d.m.Y', $post->ID); ?></p>
		
		<?php } ?>

		<?php
		// if has section title	
		if(get_field('section-title__title')) { ?>
			<h1 class="section-title__title"><?php the_field('section-title__title'); ?></h1>
		<?php }

		// if has section title	
		if(get_field('section-title__subtitle')) { ?>
			<h1 class="section-title__subtitle"><?php the_field('section-title__subtitle'); ?></h1>
		<?php }
	?>
	
	<?php 
		// Is blogpage
		if (is_home()) { ?>
 			<h1 class="section-title__title">Nyheder</h1>
	<?php } ?>

	<?php 
		// Is single
		if (is_single()) { ?>
 			<h1 class="section-title__title"><?php the_title(); ?></h1>
	<?php } ?>
	
</div>