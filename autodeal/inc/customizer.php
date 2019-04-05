<?php
/**
 * AutoDeal: Customizer
 *
 * @package WordPress
 * @subpackage autodeal
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function autodeal_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'autodeal_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Home page Settings', 'autodeal' ),
	    'description' => __( 'Description of what this panel does.', 'autodeal' ),
	) );

	//Sidebar Position
	$wp_customize->add_section('autodeal_sidebar_position',array(
        'title'         => __('Sidebar Position', 'autodeal'),
        'priority'      => 21,
        'panel' => 'autodeal_panel_id'
    ) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('autodeal_sidebar_post_layout',array(
        'default' => __('right','autodeal'),
        'sanitize_callback' => 'autodeal_sanitize_choices'
	));
	$wp_customize->add_control('autodeal_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Position', 'autodeal'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'autodeal'),
        'section' => 'autodeal_sidebar_position',
        'choices' => array(
            'full' => __('Full','autodeal'),
            'left' => __('Left','autodeal'),
            'right' => __('Right','autodeal'),
            'three-column' => __('Three Columns','autodeal'),
            'four-column' => __('Four Columns','autodeal'),
            'grid' => __('Grid Layout','autodeal')
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('autodeal_sidebar_page_layout',array(
        'default' => __('right','autodeal'),
        'sanitize_callback' => 'autodeal_sanitize_choices'
	));
	$wp_customize->add_control('autodeal_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'autodeal'),
        'description'   => __('This option work for pages.', 'autodeal'),
        'section' => 'autodeal_sidebar_position',
        'choices' => array(
            'full' => __('Full','autodeal'),
            'left' => __('Left','autodeal'),
            'right' => __('Right','autodeal')
        ),
	) );

	$wp_customize->add_section( 'autodeal_topbar', array(
    	'title'      => __( 'Contact Details', 'autodeal' ),
    	'description' => __( 'Add your contact details', 'autodeal' ),
		'priority'   => 30,
		'panel' => 'autodeal_panel_id'
	) );

	$wp_customize->add_setting('autodeal_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('autodeal_location',array(
		'label'	=> __('Add Location','autodeal'),
		'section'=> 'autodeal_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('autodeal_timming',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('autodeal_timming',array(
		'label'	=> __('Add Timming','autodeal'),
		'section'=> 'autodeal_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('autodeal_mail_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('autodeal_mail_text',array(
		'label'	=> __('Add Text','autodeal'),
		'section'=> 'autodeal_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('autodeal_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('autodeal_mail',array(
		'label'	=> __('Add Mail Address','autodeal'),
		'section'=> 'autodeal_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('autodeal_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('autodeal_call_text',array(
		'label'	=> __('Add Text','autodeal'),
		'section'=> 'autodeal_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('autodeal_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('autodeal_call',array(
		'label'	=> __('Add Phone Number','autodeal'),
		'section'=> 'autodeal_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_section( 'autodeal_social_media', array(
    	'title'      => __( 'Social Media Links', 'autodeal' ),
    	'description' => __( 'Add your Social Links', 'autodeal' ),
		'priority'   => 30,
		'panel' => 'autodeal_panel_id'
	) );

	$wp_customize->add_setting('autodeal_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('autodeal_facebook_url',array(
		'label'	=> __('Facebook Link','autodeal'),
		'section'=> 'autodeal_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('autodeal_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('autodeal_twitter_url',array(
		'label'	=> __('Twitter Link','autodeal'),
		'section'=> 'autodeal_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('autodeal_google_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('autodeal_google_url',array(
		'label'	=> __('Google Link','autodeal'),
		'section'=> 'autodeal_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('autodeal_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('autodeal_youtube_url',array(
		'label'	=> __('YouTube Link','autodeal'),
		'section'=> 'autodeal_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('autodeal_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('autodeal_pint_url',array(
		'label'	=> __('Pinterest Link','autodeal'),
		'section'=> 'autodeal_social_media',
		'type'=> 'url'
	));


	//From Our Blog
	$wp_customize->add_section('autodeal_static_blog_section',array(
		'title'	=> __('Blog Section','autodeal'),
		'description'=> __('Blogs','autodeal'),
		'panel' => 'autodeal_panel_id',
	));

	$wp_customize->add_setting('autodeal_blog_tittle',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('autodeal_blog_tittle',array(
		'label'	=> __('Blog Title','autodeal'),
		'section'	=> 'autodeal_static_blog_section',
		'type'		=> 'text'
	));

	$post_list = get_posts();
	$i = 0;
	$pst[]='Select';
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('autodeal_static_blog_1',array(
		'sanitize_callback' => 'autodeal_sanitize_choices',
	));
	$wp_customize->add_control('autodeal_static_blog_1',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','autodeal'),
		'section' => 'autodeal_static_blog_section',
	));

	$wp_customize->add_setting('autodeal_static_blog_2',array(
		'sanitize_callback' => 'autodeal_sanitize_choices',
	));
	$wp_customize->add_control('autodeal_static_blog_2',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','autodeal'),
		'section' => 'autodeal_static_blog_section',
	));

	$wp_customize->add_setting('autodeal_static_blog_3',array(
		'sanitize_callback' => 'autodeal_sanitize_choices',
	));
	$wp_customize->add_control('autodeal_static_blog_3',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','autodeal'),
		'section' => 'autodeal_static_blog_section',
	));

	//footer
	$wp_customize->add_section('autodeal_footer_section',array(
		'title'	=> __('Footer Text','autodeal'),
		'description'	=> __('Add copyright text.','autodeal'),
		'panel' => 'autodeal_panel_id'
	));

	$wp_customize->add_setting('autodeal_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('autodeal_footer_text',array(
		'label'	=> __('Copyright Text','autodeal'),
		'section'	=> 'autodeal_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'autodeal_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'autodeal_customize_partial_blogdescription',
	) );

}
add_action( 'customize_register', 'autodeal_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since AutoDeal 1.0
 * @see autodeal_customize_register()
 *
 * @return void
 */
function autodeal_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since AutoDeal 1.0
 * @see autodeal_customize_register()
 *
 * @return void
 */
function autodeal_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class autodeal_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'autodeal_Customize_Section_ProVersion' );

		// Register sections.
		$manager->add_section(
			new autodeal_Customize_Section_ProVersion(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'AutoDeal Theme', 'autodeal' ),
					'pro_text' => esc_html__( 'Under Development', 'autodeal' ),
					'pro_url'  => esc_url(''),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'autodeal-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'autodeal-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
autodeal_Customize::get_instance();