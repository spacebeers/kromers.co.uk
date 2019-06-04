<?php
    $page_for_posts_id = get_option('page_for_posts');
    $hero_image = get_field('hero_image', $page_for_posts_id);
    $ghost_image = get_field('ghost_image', $page_for_posts_id);
    $tax = "category";
?>

<?php get_header(); ?>
    <div class="container">
        <?php if ($hero_image): ?>
            <div class="hero">
                <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt'] ?>" />
            </div>
        <?php endif; ?>
        <section class="contents">
            <h1><?php echo get_post_field( 'post_title', $page_for_posts_id); ?></h1>

            <?php  echo get_post_field( 'post_content', $page_for_posts_id); ?>

            <?php edit_post_link( __( 'Edit', 'kromers' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

            <div class="posts-nav">
                <div class="collapse" id="filters">
                    <ul>
                        <li class="key"><strong>Filter by:</strong></li>
                        <li><a class='filter-button' data-filter="all">All</a></li>
                        <?php
                            $terms = get_terms( $tax, array(
                                'hide_empty' => true,
                            ));
                            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                                foreach ( $terms as $term ) {
                                    $classSelected = "";
                                    if ($term->slug !== "uncategorised"):
                                        echo "<li class=' ".$classSelected."'><a href='javascript:void(0)' class='filter-button' data-filter='.".$term->slug."'>" . $term->name . "</a></li>";
                                    endif;
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="posts-grid mixer">
                <?php get_template_part('loop'); ?>
            </div>

            <?php get_template_part('pagination'); ?>
        </section>
    </div>
<?php get_footer(); ?>
