<?php
    get_header();  
?>

    <div class="section__wrapper">
        <?php
            $category = get_the_category();

            echo "<h1 class=\"header__subtitle header__subtitle--subpage\">".$category[0]->cat_name."</h1>";

            if(have_posts()) :
                echo "<div class=\"blog\">";
            while (have_posts()) : the_post(); 
                showBlogPosts();
            endwhile; 
            echo "</div>";
        ?>
                
        <?php else: ?>

        <p><?php _e('Nie znaleziono wpisów spełniających podane kryteria.'); ?></p>
        
        <?php endif; ?>
    </div>
        
<?php
    get_footer();
?>