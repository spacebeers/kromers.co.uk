<div class="page-slash">
    <div class="container">
        <h2>Contact us</h2>

        <div class="contact-page">
            <div class="contact-details">
                <h3>Email:</h3>
                <ul>
                    <li>
                        <a href="mailto:<?php echo get_theme_mod( 'kromers_email' ); ?>"><?php echo get_theme_mod( 'kromers_email' ); ?></a>
                    </li>
                </ul>

                <h3>Address:</h3>
                <?php echo get_theme_mod( 'kromers_address' ); ?>

            </div>
            <div class="contact-form">
                <?php echo do_shortcode('[wpforms id="342"]'); ?>
            </div>
        </div>

    </div>
</div>