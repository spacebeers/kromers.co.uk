<?php
    $hero_image = get_field('hero_image');
    $strip_image = get_field('strip_image');
    $contents = get_field('content');
    $column_left = get_field('column_left');
    $column_right = get_field('column_right');
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

            <div class="columns">
                <div class="column">
                    <?php echo $column_left; ?>
                </div>
                <div class="column">
                    <?php echo $column_right; ?>
                </div>
            </div>

            <?php edit_post_link( __( 'Edit', 'kromers' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
        </section>
    </div>
     <div class="strip-image">
        <div class="parallaxed" style="background-image: url(<?php echo $strip_image['url']; ?>);"></div>
    </div>

    <?php if( have_rows('staff') ): ?>
        <div class="staff-section">
            <div class="container">
                <h2><?php the_field('staff_title'); ?></h2>

                <div class="staff-list">
                    <?php while( have_rows('staff') ): the_row();
                        // vars
                        $image = get_sub_field('image');
                        $description = get_sub_field('description');
                        $name = get_sub_field('name');
                        $phone = get_sub_field('phone_number');
                        $email = get_sub_field('email_address');
                        ?>

                        <div class="staff">
                            <div class="staff-top">
                                <div class="image">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                                </div>
                                <div class="contact">
                                    <h3><?php echo $name; ?></h3>

                                    <ul>
                                        <li>
                                            <a href="mailto:<?php echo $email; ?>">E: <?php echo $email; ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="staff-bottom">
                                <?php echo $description; ?>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php
        // vars
        $secondary_content = get_field('secondary_content');

        if( $secondary_content ): ?>
            <div class="secondary_contents">
                <div class="inner">
                    <div class="image">
                        <img src="<?php echo $secondary_content['image']['url']; ?>" alt="<?php echo $secondary_content['image']['alt']; ?>" />
                    </div>
                    <div class="content">
                        <div class="content-inner">
                            <?php echo $secondary_content['content']; ?>
                        </div>
                    </div>
                </div>
            </div>
    <?php endif; ?>

    <?php
        if (get_field('show_contact_form')):
            get_template_part('template-parts/contact', 'footer');
        endif;
    ?>
</article>