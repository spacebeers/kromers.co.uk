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
        </section>
    </div>
</article>