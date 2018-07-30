<?php get_header(); ?>

<main>
  <div class="container">
    <div class="row">
      
      <div class="b-content col-12 col-md-8 px-4 order-md-2 order-1">
        <div class="b-posts">
          <h4>Новости</h4>
          <?php
          $news = new WP_Query(array(
            'post_type' => 'news',
          	'posts_per_page' => 3
          ));
          if($news->have_posts()) : while($news->have_posts()) : $news->the_post(); ?>

	          <div class="b-post d-sm-flex">
	            <figure class="b-post__thumbnail mr-3 mb-3"><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></a></figure>
	            <div class="b-post__entry ml-sm-3 mb-3">
	              <span class="b-post__meta"><?php the_time(get_option('date_format')); ?></span>
	              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	            </div>
	          </div>

          <?php endwhile; else : endif; wp_reset_postdata(); ?>
          
        </div>
        <!-- end b-posts -->
      </div>
      <!-- end b-content -->

			<?php get_sidebar();?>
      
    </div>
    <!-- end row -->
    
  </div>
</main>
<!-- end main -->

<?php get_footer(); ?>