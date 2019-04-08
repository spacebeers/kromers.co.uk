<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
    <div class="container">
        <section class="contents">
            <h1><?php the_title(); ?></h1>

            <?php the_content(); ?>

            <?php edit_post_link( __( 'Edit', 'kromers' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>


            <?php if( have_rows('projects') ): ?>

                <div class="project-list">

                    <?php while( have_rows('projects') ): the_row();

                        // vars
                        $image = get_sub_field('image');
                        $title = get_sub_field('title');
                        ?>

                        <div class="project">
                            <div class="project-content">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                                <h2><?php echo $title; ?></h2>
                            </div>
                        </div>

                    <?php endwhile; ?>

                </div>

            <?php endif; ?>
        </section>
    </div>
</article>