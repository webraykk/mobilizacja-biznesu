<!DOCTYPE html>
<html <?= language_attributes(); ?>>
    <head>
        <meta charset="<?= bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#1f1f1d" />
        <meta name="author" content="Krzysztof Kukliński" />
        <meta name="description" content="<?= bloginfo('description'); ?>" />
        <title><?= bloginfo('name'); ?></title>
        <link rel="icon" type="image/png" href="<?= get_stylesheet_directory_uri(); ?>/dist/images/favicon.png" />
        <?= wp_head(); ?>
    </head>
    <body>
        <?php 
            $headerClass = "header";
            if(!is_front_page()){
                $headerClass.=" header--subpage";
            }
        ?>
        <header class="<?= $headerClass; ?>">
            <div class="header__wrapper">
                <div class="header__item">
                    <?php showLogo(); ?>
                </div>
                <div class="header__item">
                    <?php showMenu('menu--header'); ?>
                    <button class="mobilebutton"><span class="mobilebutton__span mobilebutton__span--top"></span><span class="mobilebutton__span mobilebutton__span--bottom"></span></button>
                </div>
            </div>
        </header>
        <main>