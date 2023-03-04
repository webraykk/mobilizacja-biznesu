<?php /* Template Name: Strona główna */ ?>

<?php
    get_header();

    $headerSection = get_field('header');
    if(!empty($headerSection)) { ?>
        <section class="section section--header">
            <div class="section__wrapper section__wrapper--header">
                <?php
                    if(!empty($headerSection['image'] || $headerSection['header'])){
                        echo "<div class=\"graphicbox graphicbox--reverse\">";
                            if(!empty($headerSection['image'])){
                                echo "<div class=\"graphicbox__item\">";
                                    $image = $headerSection['image'];
                                    $altImage = !empty($image['alt']) ? $image['alt'] : $headerSection['header'];
                                    echo "<img src=\"".$image['url']."\" alt=\"".$altImage."\" />";
                                echo "</div>";
                            }

                            if(!empty($headerSection['header'])){
                                echo "<div class=\"graphicbox__item\">";
                                    echo "<h1 class=\"header__title\">".$headerSection['header']."</h1>";

                                    if(!empty($headerSection['description'])){
                                        echo "<div class=\"graphicbox__description\">".$headerSection['description']."</div>";
                                    }

                                    if(!empty($headerSection['button']) || !empty($headerSection['phone'])){
                                        echo "<div class=\"graphicbox__box\">";
                                            showButton($headerSection, "", "header");

                                            if(!empty($headerSection['phone'])){
                                                echo "<a class=\"graphicbox__link\" href=\"tel:".str_replace(' ', '',$headerSection['phone'])."\">".$headerSection['phone']."</a>";
                                            }
                                        echo "</div>";
                                    }
                                echo "</div>";
                            }
                        echo "</div>";
                    }
                ?>
            </div>
        </section>
        <?php
    }

    $graphicBox = get_field('graphicbox');
    if(!empty($graphicBox)) { ?>
        <section class="section">
            <div class="section__wrapper">
                <?php
                    if(!empty($graphicBox['image'] || $graphicBox['header'])){
                        echo "<div class=\"graphicbox\">";
                            if(!empty($graphicBox['image'])){
                                echo "<div class=\"graphicbox__item\">";
                                    $image = $graphicBox['image'];
                                    $altImage = !empty($image['alt']) ? $image['alt'] : wp_strip_all_tags($graphicBox['header']);
                                    echo "<img src=\"".$image['url']."\" alt=\"".$altImage."\" />";
                                echo "</div>";
                            }

                            if(!empty($graphicBox['header'])){
                                echo "<div class=\"graphicbox__item\">";
                                    echo "<h2 class=\"header__subtitle\">".$graphicBox['header']."</h2>";

                                    if(!empty($graphicBox['list'])){
                                        echo "<div class=\"graphicbox__list\">";
                                            foreach($graphicBox['list'] as $item){
                                                if(!empty($item)){
                                                    echo "<p class=\"graphicbox__listItem\">".$item."</p>";
                                                }
                                            }
                                        echo "</div>";
                                    }

                                echo "</div>";
                            }
                        echo "</div>";
                    }
                ?>
            </div>
        </section>
        <?php
    }

    $info = get_field('info');
    if(!empty($info)) { ?>
        <section class="section section--info">
            <div class="section__wrapper">
                <?php if(!empty($info['list'])) { ?>
                    <div class="infolist">
                        <?php
                            foreach($info['list'] as $item){
                                if(!empty($item['item-number'] || !empty($item['item-description']))){
                                    echo "<div class=\"infolist__item\">";
                                        if(!empty($item['item-number'])){
                                            echo "<p class=\"infolist__number\">".$item['item-number']."</p>";
                                        }
                                        
                                        if(!empty($item['item-description'])){
                                            echo "<p class=\"infolist__description\">".$item['item-description']."</p>";
                                        }
                                    echo "</div>";
                                }
                            }
                        ?>
                    </div>
                <?php
                }
                    showButton($info, "infobutton", "info");
                ?>
            </div>
        </section>
        <?php
    }

    $help = get_field('help');
    if(!empty($help)) { ?>
        <section class="section">
            <div class="section__wrapper">
                <?php if(!empty($help['header'])){
                    echo "<h2 class=\"header__subtitle header__subtitle--center\">".$help['header']."</h2>";
                }
                
                if(!empty($help['list'])) { ?>
                    <div class="tiles">
                    <?php
                        foreach($help['list'] as $item){
                            if(!empty($item['item-title'])) {
                                echo "<div class=\"tiles__item\">";
                                    if(!empty($item['item-image'])){
                                       echo "<img src=\"".$item['item-image']."\" alt=\"".$item['item-title']." - ikona\" />";
                                    }
                                    echo "<h3 class=\"tiles__title\">".$item['item-title']."</h3>";

                                    if(!empty($item['item-description'])){
                                        echo "<p class=\"tiles__description\">".$item['item-description']."</p>";
                                    }
                                echo "</div>";
                            }
                        }
                    ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
        <?php
    }

    $blogArticles = query_posts(array('category_name' => 'blog', 'order' => 'desc', 'posts_per_page' => 3));

    if(!empty($blogArticles)){?>
        <section class="section"><div class="section__wrapper section__wrapper--blog">

            <?php
                $blog = get_field('blog');

                if(!empty($blog['header'])){
                    echo "<div class=\"box box--header\">";
                        echo "<h2 class=\"header__subtitle\">".$blog['header']."</h2>";
                        showButton($blog, "", "blog");
                    echo "</div>";
                }
            ?>

            <?php
                if(!empty($blogArticles)){
                    echo "<div class=\"blog\">";
                        foreach($blogArticles as $post){
                            showBlogPosts();
                        }
                    echo "</div>";

                    wp_reset_query();
                }
        ?>
        </div></section>
    <?php
    }

    get_footer();
?>

