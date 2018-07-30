<div id="carousel-news" class="carousel carousel-fade slide" data-ride="carousel" data-interval="false">
	<div class="container">
		<div class="carousel-inner">

			<?php
			$carousel = new WP_Query(array(
			  'post_type' => 'post',
				'posts_per_page' => 5,
			));
			$i = 0;
			if($carousel->have_posts()) : while($carousel->have_posts()) : $carousel->the_post(); $i++; ?>

			<div class="carousel-item<?php echo $i == 1 ? ' active' : ''; ?>">
				<div class="slide-wrap d-sm-flex justify-content-center">
					<div class="slide-image col-sm-6 col-md-8 order-sm-2" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>);">
					</div>
					<div class="slide-info d-flex flex-column align-items-end col-sm-6 col-md-4 order-sm-1">
						<div class="slide-title h-100">
							<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
						</div>
						<div class="slide-meta d-sm-flex flex-sm-column w-100">
							<span class="date"><?php the_time(get_option('date_format')); ?></span>
							<span class="category"><?php the_category(', '); ?></span>
						</div>
					</div>
				</div>
			</div>

			<?php endwhile; else : endif; wp_reset_postdata(); ?>
			
			<div class="carousel-controls">
				<a class="carousel-prev" href="#carousel-news" role="button" data-slide="prev">
					<span aria-hidden="true"></span>
				</a>
				<a class="carousel-next" href="#carousel-news" role="button" data-slide="next">
					<span aria-hidden="true"></span>
				</a>
			</div>
		</div>
	</div>
	<div class="carousel-bg"></div>
</div>
<!-- end carousel -->