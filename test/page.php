<?php get_header(); ?>

<main>
  <div class="container">
    <div class="row">
      
      <div class="b-content col-12 col-md-8 px-4 order-md-2 order-1">
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>

        		<div class="b-posts">
	          <div class="b-post">
	            <div class="b-post__entry w-100">
								<h1 class="ttl"><?php the_title(); ?></h1>
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