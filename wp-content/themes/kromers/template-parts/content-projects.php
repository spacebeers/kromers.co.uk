<?php
    $hero_image = get_field('hero_image');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
    <div class="container">
        <?php if ($hero_image): ?>
            <div class="hero">
                <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt'] ?>" />
            </div>
        <?php endif; ?>
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
                        $contents = get_sub_field('contents');
                        ?>

                        <div class="project">
                            <div class="project-content">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                                <h2><?php echo $title; ?></h2>

                                <?php if ($contents): ?>
                                    <div class="hover">
                                        <?php echo $contents; ?>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>

                    <?php endwhile; ?>

                </div>

            <?php endif; ?>
        </section>
    </div>
</article>