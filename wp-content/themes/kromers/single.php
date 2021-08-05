<?php get_header(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
        <section class="container">
            <div class="post-contents">
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                    <!-- article -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="post-content">
                            <!-- post title -->
                            <h1><?php the_title(); ?></h1>
                            <!-- /post title -->

                            <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                                <div class="inline-image" data-aos="fade-up-right">
                                    <?php the_post_thumbnail("medium"); ?>
                                </div>
                            <?php endif; ?>

                            <?php the_content(); // Dynamic Content ?>

                            <?php edit_post_link(); // Always handy to have Edit Post Links available ?>
                        </div>

                    </article>
                    <!-- /article -->

                <?php endwhile; ?>

                <?php else: ?>

                    <!-- article -->
                    <article>

                        <h1><?php _e( 'Sorry, nothing to display.', 'kromers' ); ?></h1>

                    </article>
                    <!-- /article -->

                <?php endif; ?>
            </div>
        </section>

        <section class="related-content">
            <div class="container">
                <h2>Related</h2>

                <div class="posts-grid">
                    <?php
                        $currentID = get_the_ID();
                        query_posts(array('orderby' => 'rand', 'showposts' => 2, 'post__not_in' => array($currentID)));

                        if (have_posts()) :
                            while (have_posts()) : the_post(); ?>

                                <article id="post-<?php the_ID(); ?>" class="blog-article" data-aos="fade-up-right">
                                    <!-- post thumbnail -->
                                    <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                                        <div class="post-image">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style="background-image: url(<?php echo the_post_thumbnail_url('full'); ?>);">
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <!-- /post thumbnail -->
                                    <div class="post-main">
                                        <!-- post title -->
                                        <h2>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        <!-- /post title -->

                                        <?php kromers_excerpt('kromers_index'); // Build your custom callback length in functions.php ?>

                                        <a href="<?php the_permalink(); ?>" class="more-link">Read more</a>
                                    </div>
                                </article>

                            <?php endwhile;

                        endif;
                    ?>
                </div>
            </div>
        </section>
    </article>

<?php get_footer(); ?>
