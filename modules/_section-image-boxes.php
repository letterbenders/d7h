<div class="row">
	<div class="layout">
		    <div class="layout__item 1/3 lap-1/2 palm-1/1">
		    	<div class="image-box box-1">
		    		<img src="<?php bloginfo('template_directory')?>/assets/img/box-1.jpg" alt="">
		    		<div class="image-box__text">
		    			<h4>åbningstider</h4>
		    				<?php if( have_rows('box_1') ): ?>
							    <ul>
							    	<?php while( have_rows('box_1') ): the_row(); ?>
							 			<li>
							 				<p><?php the_sub_field('box_1_item'); ?></p>
							 			</li>
							 		<?php endwhile; ?>
							 	</ul>
							<?php endif; ?>
						<a href="kontakt" class="kepler">Kontakt</a>
		    		</div>
		    	</div><!-- /image-box -->
		    	<div class="image-box box-2">
		    		<img src="<?php the_field('box_2_img'); ?>" alt="">
		    		<div class="image-box__text">
		    			<h4><?php the_field('box_2_header'); ?></h4>
						<p><?php the_field('box_2_con'); ?></p>
						<a href="<?php the_field('box_2_link'); ?>"><?php the_field('box_2_link_label'); ?></a>
		    		</div>
		    	</div><!-- /image-box -->
		    </div><!-- layout__item -->
		    <div class="layout__item 1/3 lap-1/2 palm-1/1 newsletter-box">
				<div class="image-box box-3">
					<img src="<?php the_field('box_3_img'); ?>" alt="">	
					<div class="image-box__text">
						<h4><?php the_field('box_3_header'); ?></h4>
						<p><?php the_field('box_3_con'); ?></p>
						<a href="<?php the_field('box_3_link'); ?>"><?php the_field('box_3_link_label'); ?></a>
		    		</div>
				</div><!-- /image-box -->
		    </div><!-- layout__item -->
		    <div class="layout__item 1/3 lap-1/2 palm-1/1">
				
				<div class="image-box box-4">
		    		<img src="<?php the_field('box_4_img'); ?>" alt="">	
		    		<div class="image-box__text">
						<h4><?php the_field('box_4_header'); ?></h4>
						<p><?php the_field('box_4_con'); ?></p>
						<a href="<?php the_field('box_4_link'); ?>" target="_blank"><?php the_field('box_4_link_label'); ?></a>
		    		</div>
		    	</div><!-- /image-box -->

		    	<div class="image-box box-5">
		    		<img src="<?php the_field('box_5_img'); ?>" alt="">	
		    		<div class="image-box__text">
						<p>NYHEDER</p>
							<?php
								$args = array( 'numberposts' => '1' );
								$recent_posts = wp_get_recent_posts( $args );
								foreach( $recent_posts as $recent ){
									echo '<h4>' .   $recent["post_title"].' </h4><a href="' . get_permalink($recent["ID"]) . '">Læs mere</a> ';
								}
							?>
		    		</div>
		    	</div><!-- /image-box -->

			</div><!-- layout__item -->
	</div><!-- /layout -->
</div><!-- /row -->