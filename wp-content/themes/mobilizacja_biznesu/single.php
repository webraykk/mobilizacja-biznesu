<?php
    get_header();
?>
    
    <div class="section__wrapper">
        <article>
            <h1 class="header__subtitle header__subtitle--subpage"><?= get_the_title(); ?></h1>
                <?php
                    if(!empty(the_content())){
                        the_content();
                    }
                ?>
        </article>
    </div>

<?php 
    get_footer();
?>