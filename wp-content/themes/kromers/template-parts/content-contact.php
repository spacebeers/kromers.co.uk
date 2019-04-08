<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
    <?php get_template_part( 'template-parts/content', 'banner' ); ?>

	<section class="contents">
        <div class="row">
            <div class="col-md-4">
                <?php the_content(); ?>

                <?php edit_post_link( __( 'Edit', 'kromers' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
            </div>
            <div class="col-md-8">
                <?php echo do_shortcode(get_field('form_shortcode')); ?>
            </div>
        </div>
	</section>
    <section class="contents map-frame">
        <iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJB2QcjnCadUgRVHGXFU5AJPo&key=AIzaSyC8R5iJ4Sx81O4jv_Qm_J1bLaHu_Zpfnt4" allowfullscreen></iframe>
    </section>
</article>