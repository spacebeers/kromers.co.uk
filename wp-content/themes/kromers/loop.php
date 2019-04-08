<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class('blog-article'); ?>>

		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
            <div class="post-image">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
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

            <!-- post details -->
            <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
            <span class="author"><?php _e( 'Published by', 'kromers' ); ?> <?php the_author_posts_link(); ?></span>
            <!-- /post details -->

            <?php kromers_excerpt('kromers_index'); // Build your custom callback length in functions.php ?>

            <?php edit_post_link(); ?>
        </div>
	</article>
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'kromers' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
