<article id="post-<?php the_ID(); ?>" <?php post_class("page hide-footer"); ?>>
    <div class="container">
        <section class="contents">
            <h1><?php the_title(); ?></h1>

            <?php the_content(); ?>

            <?php edit_post_link( __( 'Edit', 'kromers' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>


            <?php if( have_rows('services') ): ?>

                <div class="service-list">

                    <?php while( have_rows('services') ): the_row();

                        // vars
                        $image = get_sub_field('image');
                        $content = get_sub_field('content');
                        $title = get_sub_field('title');
                        ?>

                        <div class="service">
                            <div class="service-content">
                                <h2><?php echo $title; ?></h2>
                                <?php echo $content; ?>
                            </div>
                            <div class="service-image">
                                 <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                            </div>
                        </div>

                    <?php endwhile; ?>

                </div>

            <?php endif; ?>
        </section>
    </div>
</article>