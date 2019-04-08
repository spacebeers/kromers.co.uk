<?php get_header(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
        <?php
            $page_link = get_theme_mod('kromers_pages_contact_link');
            $show_banner = get_field('show_banner', get_option('page_for_posts'));
        ?>

        <?php if ($show_banner): ?>
            <div class="banner">
                <div class="banner-text">
                    <div class="callback">
                        <?php if (get_field('icon', get_option('page_for_posts'))): ?>
                            <img class="flair" src="<?php bloginfo('template_directory'); ?>/assets/<?php the_field('icon', get_option('page_for_posts')); ?>" alt="Flair icon for this page" role="presentation">
                        <?php endif; ?>
                        <h1><?php the_field("banner_text", get_option('page_for_posts')); ?></h1>

                        <?php if( get_theme_mod('kromers_phone') ): ?>
                            <p>Speak to a qualified advisor.<br />
                            Call <a href="tel:<?php echo get_theme_mod( 'kromers_phone' ); ?>"><?php echo get_theme_mod( 'kromers_phone' ); ?></a></p>

                            <?php if ($page_link != get_the_id()): ?>
                                <a href="<?php echo get_permalink($page_link); ?>" class="btn btn-primary">Request a consultation</a>
                            <?php endif; ?>

                        <?php endif; ?>
                    </div>
                </div>
                <div class="banner-image"  style="background-image: url(<?php echo get_the_post_thumbnail_url(get_option('page_for_posts'), 'full'); ?>);"></div>
            </div>
        <?php endif; ?>

        <section class="contents blog-container">
            <div class="blog-contents">
                <h1><?php _e( 'Latest Posts', 'mortgatestudio' ); ?></h1>

                <?php get_template_part('loop'); ?>

                <?php get_template_part('pagination'); ?>
            </div>
            <div class="blog-sidebar">
                <?php dynamic_sidebar('blog-page-sidebar'); ?>
            </div>
        </section>

    </article>

<?php get_footer(); ?>
