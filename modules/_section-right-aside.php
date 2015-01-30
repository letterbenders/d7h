<div class="row">
	<?php the_post_thumbnail(); ?>
	<div class="layout">
		    <div class="layout__item 8/12 palm-1/1">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
					<?php endwhile; else: ?>
				<?php endif; ?>
				<a href="<?php echo get_site_url(); ?>/nyheder" class="back-button">Tilbage til oversigt over nyheder</a>
		    </div><!--
		--><div class="layout__item 4/12 palm-1/1">
				<div class="share-icons">
					<p class="share-icons__text">Du er velkommen til at dele denne nyhed:</p>
					<div class="share-icons__buttons">
						<?php if (function_exists('synved_social_share_markup')) echo synved_social_share_markup(); ?>
					</div>
					
				</div>
		    </div><!--
		-->
	</div><!-- /layout -->
</div><!-- /row -->




