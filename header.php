<?php
/**
 * The header template
 *
 *
 * @package AimHigher
 * @version 1.0
 */
?>
<html>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />

        <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" />
        
        <title>AimHigher</title>
        <meta name="description" content="WordPress Template" />

        <?php wp_head(); ?>
    </head>

<body class="<?php if (is_front_page()) {echo 'home';} ?>">
    <header>
        <a href="/" class="site-logo">
            <?php
            $logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0];

            if(preg_match('/\.svg$/', $logo)) {
                echo file_get_contents($logo);
            }
            else {
                echo '<img src="' . $logo . '" />';
            }
            
            ?>
        </a>



        <?php
        $hamburger = get_template_directory_uri() . './src/img/hamburger.svg';
        $menu_toggle =
        	'<button class="hamburger" onClick="mobileMenu()">' .
        	file_get_contents($hamburger) .
        	'<span>Open Menu</span></button>';

        wp_nav_menu(array(
        	'theme_location' => 'main_menu',
        	'container' => 'nav',
        	'container_class' => 'menu main',
        	'items_wrap' => $menu_toggle . '<ul id="%1$s" data-test="true" class="%2$s">%3$s</ul>',
        ));
        ?>
    </header>

    <main  class="<?php if (is_front_page()) {echo 'home';} ?>">
