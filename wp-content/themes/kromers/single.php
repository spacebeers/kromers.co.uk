<?php get_header(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
        <?php get_template_part( 'template-parts/content', 'banner' ); ?>

        <section class="contents blog-container">
            <div class="blog-contents">
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                    <!-- article -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <!-- post title -->
                        <h1>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        </h1>
                        <!-- /post title -->

                        <!-- post details -->
                        <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
                        <span class="author"><?php _e( 'Published by', 'kromers' ); ?> <?php the_author_posts_link(); ?></span>
                        <!-- /post details -->

                        <?php the_content(); // Dynamic Content ?>

                        <?php the_tags( __( 'Tags: ', 'kromers' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

                        <p><?php _e( 'Categorised in: ', 'kromers' ); the_category(', '); // Separated by commas ?></p>

                        <p><?php _e( 'This post was written by ', 'kromers' ); the_author(); ?></p>

                        <?php edit_post_link(); // Always handy to have Edit Post Links available ?>

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
            <div class="blog-sidebar">
                 <?php dynamic_sidebar('blog-page-sidebar'); ?>
            </div>
        </section>
    </article>

<?php get_footer(); ?>
