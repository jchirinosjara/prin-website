<footer class="bg-secondary">
    <div class="container m-auto py-4 px-6 mt-6">
        <img id="footer-logo" class="m-auto" src="<?php echo esc_url(get_theme_mod('over_black_logo')); ?>" alt="Logo sobre negro">
        <div class="md:flex text-white">
            <div class="text-center md:text-left w-full">
                <h1 class="font-bold">Partido Político PRIN</h1>
                <p class="text-sm">El Perú, una sola nación</p>
                <p class="text-sm mt-2"><i class="fa-solid fa-location-dot"></i> Local Central</p>
                <p class="text-xs">Av. Argentina 2530 - Lima, Perú</p>
                <p class="text-sm mt-2"><i class="fa fa-envelope"></i> Contacto</p>
                <p class="text-xs"> <a href="mailto:contacto@prin.org.pe">contacto@prin.org.pe</a> </p>
                <p class="text-sm mt-2"><i class="fa fa-phone"></i> Teléfono</p>
                <p class="text-xs"> <a href="tel:+51999097912">+51 999 097 912 </a> </p>
            </div>
            <div class="text-center w-full  mt-6 md:mt-0">
                <h1 class="text-xl">Nuestras Redes:</h1>
                <div class="mt-3">
                    <a class="text-2xl" href="https://facebook.com/prinperu" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a class="text-2xl ml-1" href="https://twitter.com/WalterGChirinos" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a class="text-2xl ml-1" href="https://www.youtube.com/channel/UCFsUmdp2oD0f1BW0C6ZUonw" target="_blank"><i class="fa fa-youtube"></i></a>
                </div>
                <h3>#ElPerúUnaSolaRegión</h3>
                <h3>@prinperu</h3>
            </div>
            <div class="text-center md:text-right w-full text-sm mt-6 md:mt-0">
                <h1 class="text-xl">Más Información</h1>
                <div class="mt-3">
                <?php
                 if (has_nav_menu('primary_menu')) :
                  wp_nav_menu('footer_menu');
                 endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div id="copyrigth" class="text-center bg-black text-white text-xs md:text-sm p-4">&copy; Partido Político PRIN 2022 - Todos los derechos reservados</div>
</footer>

<?php
wp_footer();
?>
</body>

</html>