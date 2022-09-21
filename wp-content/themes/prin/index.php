<?php get_header(); ?>



<div id="site-content" class="container m-auto py-2 px-6 xl:px-0 mt-4">
   <h1 class="text-3xl text-center font-bold"><?php the_title(); ?></h1> 
   <?php 
   if(has_post_thumbnail()):
    ?>
   <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full">
   <?php endif; ?>
    <div class="post-content mt-6"><?php the_content(); ?></div>
    </div>

  </header>
<?php get_footer(); ?>