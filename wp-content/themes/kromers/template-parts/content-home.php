<?php
    $hero_image = get_field('hero_image');
    $strip_image = get_field('strip_image');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
    <?php if (has_post_thumbnail() ): ?>
        <div class="jumbo" style="background-image: url(<?php echo get_the_post_thumbnail_url(null, 'full'); ?>);">
            <div class="container">
                <div class="jumbo-content" data-aos="fade-up-right">
                    <h1><?php the_title(); ?></h1>

                    <?php the_excerpt(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="container">
        <section class="contents" data-aos="fade-up-right">
            <?php the_content(); ?>

            <?php edit_post_link( __( 'Edit', 'kromers' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
        </section>
    </div>

    <?php if( have_rows('strips') ): ?>
        <div class="container">
            <?php while( have_rows('strips') ): the_row(); ?>
            <?php
                // vars
                $secondary_content = get_sub_field('secondary_content');

                if( $secondary_content ): ?>
                    <div class="strip" data-aos="fade-up-right">
                        <div class="inner">
                            <div class="image">
                                <img src="<?php echo $secondary_content['image']['url']; ?>" alt="<?php echo $secondary_content['image']['alt']; ?>" />
                            </div>
                            <div class="content">
                                <div class="content-inner">
                                    <?php echo $secondary_content['content']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>


    <div class="container">
        <section class="contents">
            <div class="twitter-feed" data-aos="fade-up-right">
                <?php dynamic_sidebar('twitter-area'); ?>
            </div>
        </section>
    </div>
</article>