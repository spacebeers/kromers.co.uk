<?php
    $hero_image = get_field('hero_image');
    $strip_image = get_field('strip_image');
    $contents = get_field('content');
    $column_left = get_field('column_left');
    $column_right = get_field('column_right');
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
        <section class="contents">
            <div data-aos="fade-up-right">
                <?php the_content(); ?>
            </div>

            <div class="columns">
                <div class="column" data-aos="fade-up-right">
                    <?php echo $column_left; ?>
                </div>
                <div class="column" data-aos="fade-up-right">
                    <?php echo $column_right; ?>
                </div>
            </div>

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

            <?php endwhile; ?>
        </div>
    <?php endif; ?>


    <?php
        if (get_field('show_contact_form')):
            get_template_part('template-parts/contact', 'footer');
        endif;
    ?>
</article>