<?php

if(function_exists('add_theme_support')){
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(350,250,true);
}

register_nav_menu('menu-glowne', 'Menu główne');

function menu_item_class ($classes, $item, $args, $depth){
    $classes[] = 'menu__item';
    return $classes;
}
add_filter ('nav_menu_css_class', 'menu_item_class', 10, 4);

function menu_link_class($atts, $item, $args) {
    $class = 'menu__link';
    $atts['class'] = $class;
    return $atts;
}
add_filter('nav_menu_link_attributes', 'menu_link_class', 10, 3);

function myAssets() {
    wp_enqueue_style( 'bundle.css', get_template_directory_uri().'/dist/css/bundle.css', array(), date('Y-m-d-H-i-s'), 'all');
    wp_enqueue_script('bundle.min.js', get_template_directory_uri() . '/dist/js/bundle.min.js', array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'myAssets');

function showMenu($additionalClass = "") {
    $menu = wp_nav_menu(array(
        'menu' => 'Menu główne',
        'menu_class' => 'menu__list',
        'menu_id' => 'menu',
        'container' => 'nav',
        'container_class' => $additionalClass ? 'menu '.$additionalClass.'' : 'menu',
        )
    );

    if(!empty($menu)){
        $menu;
    }
}

function showBlogPosts() { ?>
    <div class="blog__item"><article> <?php
        if(has_post_thumbnail()){
            echo "<div class=\"blog__image\"><a href=\"".get_permalink()."\"><img src=\"".get_the_post_thumbnail_url(get_the_ID())."\" alt=\"".get_the_title()."\" /></a></div>";
        }
        else{
            echo "<div class=\"blog__image\"><a href=\"".get_permalink()."\"><img src=\"".get_template_directory_uri()."/dist/images/placeholder-image.jpg\" alt=\"blog - obrazek zastępczy\" /></a></div>";
        }

        if(!empty(get_the_title())){
            echo "<h2 class=\"blog__title\"><a href=\"".get_permalink()."\">".get_the_title()."</a></h2>";
            
            echo "<div class=\"box box--post\">";
                echo "<div class=\"blog__date\"><span>".get_the_date()."</span></div>";
                echo "<a class=\"blog__more\" href=\"".get_permalink()."\">Czytaj</a>";
            echo "</div>";
        } ?>
    </article></div>
    <?php
}

function showLogo() { ?>
    <a href="<?= get_home_url(); ?>">
        <img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/logo.svg" alt="<?= bloginfo('name'); ?> - logo" />
    </a> <?php
}

function showButton($element, $containerClass = "", $additionalbuttonClass = "") {
    if(!empty($element['button'])){
        $button = $element['button'];

        if(!empty($button['title'])){
            if($containerClass){
                echo "<div class=\"".$containerClass."\">";
                    echo "<a class=\"morebutton";
                    if($additionalbuttonClass){
                        echo " morebutton--".$additionalbuttonClass;
                    }
                    echo "\" href=\"".$button['url']."\" target=\"".$button['target']."\">".$button['title']."</a>";
                echo "</div>";
            }
            else {
                echo "<a class=\"morebutton";
                if($additionalbuttonClass){
                    echo " morebutton--".$additionalbuttonClass;
                }
                echo "\" href=\"".$button['url']."\" target=\"".$button['target']."\">".$button['title']."</a>";
            }
        } 
    }
}

function footerTopSection() { 
    $mainElement = get_page_by_path('strona-glowna');
    $footer = get_field('footer', $mainElement->ID);
    ?>
    
    <div class="footer__box">
		<div class="footer__boxItem">
			<div class="footer__boxLogo">
                <?php showLogo(); ?>
            </div>
            <?php 
                if(!empty($footer['footer-description'])){ ?>
                <div class="footer__boxDescription"><?= $footer['footer-description']; ?></div>
            <?php
                }
            ?>
		</div>
        <div class="footer__boxItem">
            <?php showMenu(); ?>
        </div>
	</div>
    <?php
}

?>