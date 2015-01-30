<div class="row">
	<?php if( !is_front_page() ) : ?>
		<div class="clients grey">
			<img src="<?php the_field('footer_logos', 7) ?>" alt="">
		</div>
	<?php else: ?>
		<div class="clients">
			<img src="<?php the_field('footer_logos', 7) ?>" alt="">
		</div>
	<?php endif; ?>
	
	<div class="layout">
		
		<?php if (is_front_page() ) : ?>
		    <div class="layout__item lap-1/2 1/3 palm-1/1">
					<div class="image-box box-1-alt">
		    		<img src="<?php the_field('widget_1_alt_img', 7); ?>" alt="">
		    		<div class="image-box__text">
		    			<h4>Find vej</h4>
						<a href="https://www.google.dk/maps/place/Roskildevej+284,+2610+R%C3%B8dovre/@55.672141,12.465123,17z/data=!3m1!4b1!4m2!3m1!1s0x46525145397ea611:0x4653fb758e8d3510" target="_blank">Se kort her</a>
		    		</div>
		    	</div>
		    </div>
	
	<?php else: ?>

		<div class="layout__item lap-1/2 1/3 palm-1/1">
			<div class="image-box box-1">
	    		<img src="<?php the_field('widget_1_img', 7); ?>" alt="">
	    		<div class="image-box__text">
	    			<h4>Nyhedsbrev</h4>
					<a href="/nyhedsbrev">Tilmeld dig her</a>
	    		</div>
	    	</div>
	    </div><!-- /layout__item -->
	<?php endif; ?>

		<div class="layout__item lap-1/2 1/3 palm-1/1 facebook">
			<div class="image-box box-2">
		    	<img src="<?php the_field('widget_2_img', 7); ?>" alt="">
		    		<div class="image-box__text">
						<h4>Den 7. himmel på</h4>
						<p>FACEBOOK</p>
						<a href="https://www.facebook.com/den7himmel?fref=ts" target="_blank">Like us</a>		
		    		</div>
		    	</div>
		    </div><!-- /layout__item -->

		    <div class="layout__item lap-1/2 1/3 palm-1/1">
					<div class="image-box box-3">
		    		<img src="<?php the_field('widget_3_img', 7); ?>" alt="">
		    		<div class="image-box__text">
						<h4>Book en tid</h4>
						<a href="/kontakt">Bestil tid her</a>
		    		</div>
		    	</div>
		    </div><!-- /layout__item -->

	</div><!-- /layout -->
</div><!-- /row -->

<div class="row section-line">
	<hr class="page-line">
</div>


<div class="row">
	<div class="contact">
		<p class="contact__name">Den 7. Himmel Aps - Få det bedste ud af natten</p>
		<p class="contact__adress">Roskildevej 284 · 2610 Rødovre<br><a href="mailto:info@den7himmel.dk">info@den7himmel.dk</a> · +45 36 72 60 80</p>
	</div>
</div>