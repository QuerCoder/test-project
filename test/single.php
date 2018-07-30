<?php get_header(); ?>

<main>
  <div class="container">
    <div class="row">
      
      <div class="b-content col-12 col-md-8 px-4 order-md-2 order-1">
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>

        		<div class="b-posts pt-4">
	          <div class="b-post">
	            <div class="b-post__entry w-100">
								<h1 class="ttl"><?php the_title(); ?></h1>
	              <span class="b-post__meta"><?php the_time(get_option('date_format')); ?></span>
	            <figure class="b-post__thumbnail w-100"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></figure>
								<?php the_content(); ?>
	            </div>
	          </div>
	          </div>

				<?php endwhile; else : endif; ?>
      </div>
      <!-- end b-content -->

			<?php get_sidebar();?>
      
    </div>
    <!-- end row -->
    
  </div>
</main>
<!-- end main -->
<?php get_footer(); ?>