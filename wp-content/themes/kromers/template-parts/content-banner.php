<?php
    $page_link = get_theme_mod('kromers_pages_contact_link');
    $show_banner = get_field('show_banner');
?>

<?php if ($show_banner): ?>
    <div class="banner">
        <div class="banner-text">
            <div class="callback">
                <?php if (get_field('icon')): ?>
                    <img class="flair" src="<?php bloginfo('template_directory'); ?>/assets/<?php the_field('icon'); ?>" alt="Flair icon for this page" role="presentation">
                <?php endif; ?>
                <h1><?php the_field("banner_text"); ?></h1>

                <?php if( get_theme_mod('kromers_phone') ): ?>
                    <p>Speak to a qualified advisor.<br />
                    Call <a href="tel:<?php echo get_theme_mod( 'kromers_phone' ); ?>"><?php echo get_theme_mod( 'kromers_phone' ); ?></a></p>

                    <?php if ($page_link != get_the_id()): ?>
                        <a href="<?php echo get_permalink($page_link); ?>" class="btn btn-primary">Request a consultation</a>
                    <?php endif; ?>

                <?php endif; ?>
            </div>
        </div>
        <div class="banner-image"  style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></div>
    </div>
<?php endif; ?>