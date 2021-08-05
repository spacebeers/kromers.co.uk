<div class="posts-grid">
    <?php if (have_posts()): while (have_posts()) : the_post();
        $tags = array();
        $cats = get_the_category();
        foreach ($cats as $value):
            array_push($tags, $value->slug);
        endforeach;
        array_push($tags, "blog-article");
        array_push($tags, "mix");
        array_push($tags, "posts-page");
        $string = implode(' ', $tags);
    ?>

        <!-- article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class($string); ?> data-aos="fade-up-right">
            <!-- post thumbnail -->
            <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                <div class="post-image">
                    <a href="<?php the_permalink(); ?>" style="background-image: url(<?php echo the_post_thumbnail_url('medium'); ?>);">
                    </a>
                </div>
            <?php endif; ?>
            <!-- /post thumbnail -->
            <div class="post-main">
                <!-- post title -->
                <h2>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <!-- /post title -->

                <?php kromers_excerpt('kromers_index'); // Build your custom callback length in functions.php ?>

                <a href="<?php the_permalink(); ?>" class="more-link">Read more</a>
            </div>
        </article>
        <!-- /article -->
    <?php endwhile; ?>
</div>
<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'kromers' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
