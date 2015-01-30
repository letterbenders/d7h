<div class="row">
	<div class="masonry">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
					<div class="masonry__item layout__item">
				 		<div class="masonry__item__content">
				 			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				  			<p class="p-header"><strong><?php the_title(); ?></strong></p>
				  			<p><?php the_excerpt(); ?></p>
				 		</div>
				 		<a href="<?php the_permalink(); ?>" class="readmore">Læs mere</a>
					</div><!-- /masonry__item -->
			<?php endwhile; ?>
		<?php endif; ?>
	</div><!-- /masonry -->
</div><!-- /row -->