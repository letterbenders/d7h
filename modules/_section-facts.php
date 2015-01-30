<div class="row">
	<div class="1/1">
		<?php //Check if there is a title
			if(get_field('facts_header')) { ?>
				<h2 class="section-facts__header"><?php the_field('facts_header'); ?></h2>
		<?php } ?>
		
		<?php if( have_rows('facts') ): ?>
 			<ul class="list__grey">
				<?php while( have_rows('facts') ): the_row(); ?>
				 	<li><?php the_sub_field('facts_item'); ?></li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div><!-- / 1/1 -->
</div><!-- /row -->