<?php
    // Menus
	register_nav_menus( array(
		'main_menu' => 'Main menu'
	) );

    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

    function special_nav_class ($classes, $item) {
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
        }
        return $classes;
    }

    // Fonts
    function wpb_add_google_fonts() {
        wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Bebas+Neue&amp;family=Montserrat:wght@100;300;600&amp;display=swap', false );
    }

    add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

    // Vendor scripts
    function kromers_theme_name_scripts() {
        wp_enqueue_script( 'app', get_template_directory_uri() . '/scripts/app.js', array ( 'jquery' ), 1.1, true);
        wp_enqueue_script( 'mixitup', get_template_directory_uri() . '/vendor/mixitup.min.js', array ( 'jquery' ), 1.1, true);
        wp_enqueue_script( 'mixitup-pagination', get_template_directory_uri() . '/vendor/mixitup-pagination.min.js', array ( 'jquery' ), 1.1, true);
        //wp_enqueue_script( 'parallax', get_template_directory_uri() . '/vendor/parallax.min.js', array ( 'jquery' ), 1.1, true);
    }
    add_action( 'wp_enqueue_scripts', 'kromers_theme_name_scripts' );

    add_action( 'wp_enqueue_scripts', 'add_aos_animation' );
    function add_aos_animation() {
        wp_enqueue_style('AOS_animate', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css', false, null);
        wp_enqueue_script('AOS', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js', false, null, true);
        wp_enqueue_script('theme-js', get_template_directory_uri() . '/scripts/theme.js?buster=1', array( 'AOS' ), null, true);
    }

	// Post support
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );
    add_post_type_support( 'page', 'excerpt' );

    // Custom shortcodes
    function contact_email_shortcode() {
        return get_theme_mod( 'kromers_email', '' );
    }
    add_shortcode('contact_email', 'contact_email_shortcode');

    function contact_phone_shortcode() {
        return get_theme_mod( 'kromers_phone', '' );
    }
    add_shortcode('contact_phone', 'contact_phone_shortcode');



	// Theme customisers

	function kromers_theme_customizer( $wp_customize ) {

        // contact
        $wp_customize->add_section( 'kromers_contact_section' , array(
			'title'       => __( 'Contact', 'kromers' ),
			'priority'    => 30,
			'description' => 'Add the company contact details in here',
		));

		$wp_customize->add_setting( 'kromers_address' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kromers_address', array(
		    'label'    => __( 'Address', 'kromers' ),
		    'section'  => 'kromers_contact_section',
		    'settings' => 'kromers_address',
            'type'			 => 'textarea'
		)));

		$wp_customize->add_setting( 'kromers_phone' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kromers_phone', array(
		    'label'    => __( 'Phone', 'kromers' ),
		    'section'  => 'kromers_contact_section',
		    'settings' => 'kromers_phone',
            'type'			 => 'text'
		)));

		$wp_customize->add_setting( 'kromers_email' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kromers_email', array(
		    'label'    => __( 'Email', 'kromers' ),
		    'section'  => 'kromers_contact_section',
		    'settings' => 'kromers_email',
            'type'			 => 'text'
		)));

		$wp_customize->add_setting( 'kromers_twitter' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kromers_twitter', array(
		    'label'    => __( 'Twitter', 'kromers' ),
		    'section'  => 'kromers_contact_section',
		    'settings' => 'kromers_twitter',
            'type'			 => 'text'
		)));

		$wp_customize->add_setting( 'kromers_linkedin' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kromers_linkedin', array(
		    'label'    => __( 'LinkedIn', 'kromers' ),
		    'section'  => 'kromers_contact_section',
		    'settings' => 'kromers_linkedin',
            'type'			 => 'text'
		)));

        $wp_customize->add_section( 'kromers_pages_section' , array(
			'title'       => __( 'Page links', 'kromers' ),
			'priority'    => 30,
			'description' => 'Set links to pages here',
		));

        $wp_customize->add_setting( 'kromers_pages_contact_link', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'kromers_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'kromers_pages_contact_link', array(
            'type' => 'dropdown-pages',
            'section' => 'kromers_pages_section', // Add a default or your own section
            'label' => __( 'Set Contact page' ),
            'description' => __( 'Select a page to use as the contacts link.' ),
        ) );

        $wp_customize->add_setting( 'kromers_footer_text' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kromers_footer_text', array(
		    'label'    => __( 'Footer text', 'kromers' ),
		    'section'  => 'kromers_contact_section',
		    'settings' => 'kromers_footer_text',
            'type'			 => 'textarea',
            'sanitize_callback' => 'test_sanitize_text',
        )));

        function kromers_sanitize_dropdown_pages( $page_id, $setting ) {
            // Ensure $input is an absolute integer.
            $page_id = absint( $page_id );

            // If $page_id is an ID of a published page, return it; otherwise, return the default.
            return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
        }
	}

	add_action( 'customize_register', 'kromers_theme_customizer' );


    // Custom post types
   function create_posttype() {
        register_post_type('projects',
            array(
                'labels' => array(
                    'name' => __( 'Projects' ),
                    'singular_name' => __( 'Project' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'projects'),
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            )
        );

        register_post_type('service',
            array(
                'labels' => array(
                    'name' => __( 'Services' ),
                    'singular_name' => __( 'Service' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'specialisms'),
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            )
        );
    }

    flush_rewrite_rules();

    add_action( 'init', 'create_posttype' );

    

    // Create the Custom Excerpts callback
    function kromers_excerpt($length_callback = '', $more_callback = '') {
        global $post;
        if (function_exists($length_callback)) {
            add_filter('excerpt_length', $length_callback);
        }
        if (function_exists($more_callback)) {
            add_filter('excerpt_more', $more_callback);
        }
        $output = get_the_excerpt();
        $output = apply_filters('wptexturize', $output);
        $output = apply_filters('convert_chars', $output);
        $output = '<p>' . $output . '</p>';
        echo $output;
    }

    // Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
    function kromers_pagination() {
        global $wp_query;
        $big = 999999999;
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages
        ));
    }

    // Sidebars

    /**
    * Register widgetized area and update sidebar with default widgets
    */
    function kromers_widgets_init() {
        register_sidebar( array(
            'name' => __( 'Homepage Twitter Area', 'kromers' ),
            'id' => 'twitter-area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));
    }
    add_action( 'widgets_init', 'kromers_widgets_init' );

    // function and action to order classes alphabetically

    function alpha_order_classes( $query ) {
        if ( $query->is_post_type_archive('service') && $query->is_main_query() ) {
            $query->set( 'orderby', 'title' );
            $query->set( 'order', 'ASC' );
        }
    }

    add_action( 'pre_get_posts', 'alpha_order_classes' );

    function theme_slug_setup() {
        add_theme_support( 'title-tag' );
    }
    add_action( 'after_setup_theme', 'theme_slug_setup' );
    
?>