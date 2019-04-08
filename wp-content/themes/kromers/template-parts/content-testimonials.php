<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
    <?php get_template_part( 'template-parts/content', 'banner' ); ?>

    <section class="contents">
        <?php the_content(); ?>

        <?php edit_post_link( __( 'Edit', 'kromers' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
	</section>

    <section class="contents testimonials">
        <?php
            $args = array(
                'post_type'=>'testimonials'
            );
            $services = new WP_Query($args);
            while ($services->have_posts()) : $services->the_post(); ?>
                <?php
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
                ?>

                <div class="testimonial">
                    <div class="image" style="background-image: url(<?php echo $url; ?>);"></div>
                    <figure>
                        <blockquote>
                            <?php the_field('content'); ?>
                        </blockquote>
                        <figcaption><?php the_field('author'); ?></figcaption>
                    </figure>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        ?>
	</section>
</article>