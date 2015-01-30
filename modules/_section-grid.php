<div class="row">
	<div class="layout mt+ palm-mt0">
		<?php if( have_rows('grid') ): ?>
		 		<?php while( have_rows('grid') ): the_row(); ?>
		 			 
		 			 <div class="layout__item grid__item 1/3 lap-1/2 palm-1/1">
		 			 	<?php //Check if item has image
							if(get_sub_field('grid_img')) { ?>
								<img src="<?php the_sub_field('grid_img'); ?>" alt="">
						<?php } ?>

						<?php //Check if item has content
							if(get_sub_field('grid_content')) { ?>
								<div class="grid__item__content">
									<?php the_sub_field('grid_content'); ?>
				    			</div>
						<?php } ?>

						<?php //Check if item has link
							if(get_sub_field('grid_link')) { ?>
								<div class="grid__item__content">
									<a href="<?php the_sub_field('grid_link') ?>" class="readmore">Læs mere</a>
				    			</div>
						<?php } ?>

				    </div><!-- grid__item -->
		    	<?php endwhile; ?>
		<?php endif; ?>
	</div> <!-- /layout -->
</div><!-- /row -->