<?php
    $hero_image = get_field('hero_image');
    $strip_image = get_field('strip_image');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("page hide-footer"); ?>>
    <?php if (has_post_thumbnail() ): ?>
        <div class="jumbo" style="background-image: url(<?php echo get_the_post_thumbnail_url(null, 'full'); ?>);">
            <div class="container">
                <div class="jumbo-content" data-aos="fade-up-right">
                    <h1><?php the_title(); ?></h1>

                    <?php the_excerpt(); ?>

                    <div class="contact-details">
                        <div class="contact-col">
                            <h3>Address:</h3>
                            <?php echo get_theme_mod( 'kromers_address' ); ?>
                        </div>
                        <div class="contact-col">
                            <h3>Get in touch:</h3>
                            <ul class="contact-list">
                                <li>
                                    <a href="tel:<?php echo get_theme_mod( 'kromers_phone' ); ?>">
                                        <span class="dashicons dashicons-email-alt"></span>
                                        <?php echo get_theme_mod( 'kromers_phone' ); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:<?php echo get_theme_mod( 'kromers_email' ); ?>">
                                        <span class="dashicons dashicons-email-alt"></span>
                                        <?php echo get_theme_mod( 'kromers_email' ); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo get_theme_mod( 'kromers_twitter' ); ?>" target="_blank">
                                        <span class="dashicons dashicons-twitter"></span>
                                        Twitter
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo get_theme_mod( 'kromers_linkedin' ); ?>" target="_blank">
                                        <span class="dashicons dashicons-linkedin"></span>
                                        LinkedIn
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</article>