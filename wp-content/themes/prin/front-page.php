<?php get_header(); ?>


<div id="site-content" class="container m-auto px-6 xl:px-0">
  <?php the_content() ?>

  <div class="mt-6">
    <h1 class="text-2xl font-bold">Actividad reciente</h1>
    <div class="grid md:grid-cols-3 md:gap-3">
      <?php
      $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 6,
        'post_status' => 'publish'
      ));
      foreach ($recent_posts as $post_item) : ?>
      <div>
        
        <a class="mt-3" href="<?php echo get_permalink($post_item['ID']) ?>">
        <article>
          <span class="text-sm bg-primary text-white rounded px-2"><?php echo get_the_category($post_item['ID'])[0]->name; ?></span>
           <img src="<?php echo get_the_post_thumbnail_url($post_item['ID'], 'frontpage-cover'); ?>"  class="w-full" alt=""> 
          <h1 class="slider-caption-class font-bold"><?php echo $post_item['post_title'] ?></p>
          </article>
        </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>



</header>
<?php get_footer(); ?>