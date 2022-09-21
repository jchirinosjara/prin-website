<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body>
  <header>
    <div class="contact-info bg-secondary text-white hidden md:block">
      <div class="container m-auto py-2 px-6 xl:px-0">
        <div class="md:flex text-center text-sm">
          <div class="md:w-full md:text-left">

            <i class="fa-solid fa-location-dot text-xs"></i>
            Av. Argentina 2530, Lima - Perú
          </div>
          <div class="md:w-full">
            <i class="fa fa-envelope text-xs"></i>
            <a href="mailto:contacto@prin.org.pe">contacto@prin.org.pe</a>
          </div>
          <div class="md:w-full md:text-right">
            <div class="contact-phone inline-block">
              <span><i class="fa fa-phone"></i> <a href="tel:+51999097912">+51 999 097 912 </a></span>
              <span class="hidden md:inline-block mx-1">/</span>
            </div>
            <div class="contact-social inline-block">
              <span>Síguenos:</span>
              <span class="ml-1">
                <a class="" href="https://facebook.com/prinperu" target="_blank"><i class="fa fa-facebook"></i></a>
                <a class="ml-1" href="https://twitter.com/WalterGChirinos" target="_blank"><i class="fa fa-twitter"></i></a>
                <a class="ml-1"  href="https://www.youtube.com/channel/UCFsUmdp2oD0f1BW0C6ZUonw" target="_blank"><i class="fa fa-youtube"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="navigation-container border sticky top-0 bg-white z-10">
      <div id="site-navigation" class="container m-auto py-2 px-6 xl:px-0">
        <div class="md:flex">
          <div id="site-logo" class="flex-none inline-block md:block">
            <?php the_custom_logo(); ?>
          </div>
          <div class="align-top inline-block float-right">
          <button id="toogle-menu" class=" md:hidden border px-2 py-1 rounded mt-4"> <i class="fa fa-bars"></i> </button>
        </div>
          <nav id="navigation-menu" class="container m-auto mt-5 md:mt-0 md:p-2 md:ml-8 hidden md:block">
            <?php get_primary_menu() ?>
          </nav>
        </div>
      </div>
    </div>