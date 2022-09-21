<?php

/** Funciones habilitadas para el tema */
add_theme_support('admin-bar');
add_theme_support('html5');
add_theme_support('post-thumbnails');
add_theme_support('custom-logo');
add_theme_support('title-tag');
add_theme_support('menus');

/** Menús */
if (!function_exists('mytheme_register_nav_menu')) {

  function mytheme_register_nav_menu()
  {
    register_nav_menus(array(
      'primary_menu' => __('Menú Principal', 'prin'),
      'social_menu' => __('Redes Sociales', 'prin'),
      'footer_menu'  => __('Menú Pie de Página', 'prin'),
    ));
  }
  add_action('after_setup_theme', 'mytheme_register_nav_menu', 0);
}

/** Tamaños de imagen personalizado */
add_image_size('post-cover', 1200, 630, true);
add_image_size('frontpage-cover', 350, 200, true);


/** Librerías del tema */
function register_js()
{
  wp_enqueue_script('jquery', "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js");
  wp_enqueue_script('tailwind', 'https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp');
  wp_enqueue_script('prin', get_stylesheet_directory_uri()."/prin.js", array(), false, true);
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css');
  wp_enqueue_style('prin', get_stylesheet_uri());
}

/** Menú Principal */
function get_primary_menu()
{
  $primaryMenu = "";
  if (has_nav_menu('primary_menu')) :
    $primaryMenu .= "<ul class=\"md:flex\">";
    $menuItems = array();
    $menu_items = wp_get_nav_menu_items(wp_get_nav_menu_name('primary_menu'));

    // Primer Nivel
    foreach ($menu_items as $menu_item) :
      if (!$menu_item->menu_item_parent) :
        $menuItems[$menu_item->db_id] = $menu_item;
        $menuItems[$menu_item->db_id]->hasChildrens = false;
        $menuItems[$menu_item->db_id]->childrens = array();
      endif;
    endforeach;

    // Segundo Nivel
    foreach ($menu_items as $menu_item) :
      if ($menu_item->menu_item_parent > 0) :
        $menuItems[$menu_item->menu_item_parent]->hasChildrens = true;
        array_push($menuItems[$menu_item->menu_item_parent]->childrens, $menu_item);
      endif;
    endforeach;

    foreach ($menuItems as  $menuItem) {
      $primaryMenu .= "<li class=\"w-full menu-item-parent\">";
      $primaryMenu .= "<a class=\"p-3 rounded block ".esc_attr(implode(' ', $menu_item->classes))."\" href=\""  . esc_url($menuItem->url) . "\" target=\"".esc_attr($menu_item->target ?: '_self')."\"> <span class=\"flex md:block\"> <span class=\"w-full\">" . esc_html($menuItem->title)."</span>";
      if ($menuItem->hasChildrens) :
        $primaryMenu .= "<i class=\"ml-2 fa fa-caret-down text-xs\"></i>";
      endif;
      $primaryMenu .= "</span></a>";
      if ($menuItem->hasChildrens) :
        $primaryMenu .= "<ul class=\"p-3 md:hidden md:absolute bg-white z-50\">";
        foreach ($menuItem->childrens as $children) :
          $primaryMenu .= "<li class=\"block\"><a class=\"p-3 rounded block ".esc_attr(implode(' ', $menu_item->classes))."\" href=\"" . esc_url($children->url) . "\" target=\"".esc_attr($menu_item->target ?: '_self')."\">" . esc_html($children->title) . "</a></li>";
        endforeach;
        $primaryMenu .= "</ul>";
      endif;
      $primaryMenu .= "</li>";
    }

    $primaryMenu .= "</ul>";
    echo $primaryMenu;
  endif;
}

/** Logo sobre negro */
function register_over_black_logo($wp_customize)
{
    $wp_customize->add_setting('over_black_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_over_black', array(
        'label' => 'Logo sobre negro',
        'section' => 'title_tagline',
        'settings' => 'over_black_logo',
        'priority' => 8
    )));
}
add_action('customize_register', 'register_over_black_logo');

/** Desactivar API Rest */
function qode_disable_rest_api($access)
{
  return new WP_Error('rest_disabled', __('The WordPress REST API has been disabled.'), array('status' => rest_authorization_required_code()));
}


/**
 * Desactivar funciones extra de Wordpress
 */

add_filter('xmlrpc_enabled', '__return_false');

function disable_wordpress_extras()
{

  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_head', 'rest_output_link_wp_head', 10);
  remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
  remove_action('wp_head', 'wp_resource_hints', 2, 99);

  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
  add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}



/** Desactivar Emojis de Wordpress */
function disable_emojis_tinymce($plugins)
{
  if (is_array($plugins)) {
    return array_diff($plugins, array('wpemoji'));
  } else {
    return array();
  }
}

function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
  if ('dns-prefetch' == $relation_type) {
    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

    $urls = array_diff($urls, array($emoji_svg_url));
  }

  return $urls;
}


if(!is_admin()):
  add_action('wp_enqueue_scripts', 'register_js');
  add_action('init', 'disable_wordpress_extras');
endif;

if(!is_user_logged_in()):
  add_filter('rest_authentication_errors', 'qode_disable_rest_api');
endif;