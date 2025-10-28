<?php
/**
 * Black Emerald functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Black Emerald 1.0
 */

// Adds theme support for post formats.
if ( ! function_exists( 'twentytwentyfive_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since Black Emerald 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_post_format_setup' );

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'twentytwentyfive_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Black Emerald 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_editor_style() {
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'twentytwentyfive_editor_style' );

// Enqueues style.css on the front.
if ( ! function_exists( 'twentytwentyfive_enqueue_styles' ) ) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since Black Emerald 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_enqueue_styles() {
		wp_enqueue_style(
			'twentytwentyfive-style',
			get_parent_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_enqueue_styles' );

// Registers custom block styles.
if ( ! function_exists( 'twentytwentyfive_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Black Emerald 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfive' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'twentytwentyfive_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Black Emerald 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfive_page',
			array(
				'label'       => __( 'Pages', 'twentytwentyfive' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfive' ),
			)
		);

		register_block_pattern_category(
			'twentytwentyfive_post-format',
			array(
				'label'       => __( 'Post formats', 'twentytwentyfive' ),
				'description' => __( 'A collection of post format patterns.', 'twentytwentyfive' ),
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_pattern_categories' );

// Registers block binding sources.
if ( ! function_exists( 'twentytwentyfive_register_block_bindings' ) ) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since Black Emerald 1.0
	 *
	 * @return void
	 */
	function twentytwentyfive_register_block_bindings() {
		register_block_bindings_source(
			'twentytwentyfive/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'twentytwentyfive' ),
				'get_value_callback' => 'twentytwentyfive_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_register_block_bindings' );

// Registers block binding callback function for the post format name.
if ( ! function_exists( 'twentytwentyfive_format_binding' ) ) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since Black Emerald 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function twentytwentyfive_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;

// SPA Functionality for Black Emerald Theme
if ( ! function_exists( 'blackemerald_spa_scripts' ) ) :
	/**
	 * Enqueues SPA scripts and localizes data.
	 *
	 * @since Black Emerald 1.0
	 *
	 * @return void
	 */
	function blackemerald_spa_scripts() {
		// Enqueue SPA JavaScript
		wp_enqueue_script(
			'blackemerald-spa',
			get_theme_file_uri( '/assets/js/spa.js' ),
			array(),
			wp_get_theme()->get( 'Version' ),
			true
		);
		
		// Localize data for SPA
		wp_localize_script( 'blackemerald-spa', 'spaData', array(
			'rest_url' => rest_url(),
			'nonce' => wp_create_nonce( 'wp_rest' ),
			'siteName' => get_bloginfo( 'name' ),
			'homeUrl' => home_url(),
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'isAdmin' => current_user_can( 'edit_posts' )
		));
	}
endif;
add_action( 'wp_enqueue_scripts', 'blackemerald_spa_scripts' );

// Custom REST API endpoints for SPA
if ( ! function_exists( 'blackemerald_register_rest_routes' ) ) :
	/**
	 * Registers custom REST routes for SPA functionality.
	 *
	 * @since Black Emerald 1.0
	 *
	 * @return void
	 */
	function blackemerald_register_rest_routes() {
		// Get page content by slug
		register_rest_route( 'blackemerald/v1', '/page/(?P<slug>[\w-]+)', array(
			'methods' => 'GET',
			'callback' => 'blackemerald_get_page_content',
			'permission_callback' => '__return_true',
			'args' => array(
				'slug' => array(
					'required' => true,
					'validate_callback' => function($param, $request, $key) {
						return is_string( $param ) && ! empty( $param );
					}
				)
			)
		));
		
		// Get post content by slug
		register_rest_route( 'blackemerald/v1', '/post/(?P<slug>[\w-]+)', array(
			'methods' => 'GET',
			'callback' => 'blackemerald_get_post_content',
			'permission_callback' => '__return_true',
			'args' => array(
				'slug' => array(
					'required' => true,
					'validate_callback' => function($param, $request, $key) {
						return is_string( $param ) && ! empty( $param );
					}
				)
			)
		));
	}
endif;
add_action( 'rest_api_init', 'blackemerald_register_rest_routes' );

// Callback for page content endpoint
if ( ! function_exists( 'blackemerald_get_page_content' ) ) :
	/**
	 * Returns page content for SPA.
	 *
	 * @since Black Emerald 1.0
	 *
	 * @param WP_REST_Request $request
	 * @return WP_REST_Response|WP_Error
	 */
	function blackemerald_get_page_content( $request ) {
		$slug = $request->get_param( 'slug' );
		
		$page = get_page_by_path( $slug );
		
		if ( ! $page ) {
			return new WP_Error( 'page_not_found', 'Page not found', array( 'status' => 404 ) );
		}
		
		// Check if page is published
		if ( $page->post_status !== 'publish' && ! current_user_can( 'edit_posts' ) ) {
			return new WP_Error( 'page_not_accessible', 'Page not accessible', array( 'status' => 403 ) );
		}
		
		return rest_ensure_response( array(
			'title' => get_the_title( $page ),
			'content' => apply_filters( 'the_content', $page->post_content ),
			'excerpt' => get_the_excerpt( $page ),
			'type' => 'page',
			'id' => $page->ID
		));
	}
endif;

// Callback for post content endpoint
if ( ! function_exists( 'blackemerald_get_post_content' ) ) :
	/**
	 * Returns post content for SPA.
	 *
	 * @since Black Emerald 1.0
	 *
	 * @param WP_REST_Request $request
	 * @return WP_REST_Response|WP_Error
	 */
	function blackemerald_get_post_content( $request ) {
		$slug = $request->get_param( 'slug' );
		
		$post = get_page_by_path( $slug, OBJECT, 'post' );
		
		if ( ! $post ) {
			return new WP_Error( 'post_not_found', 'Post not found', array( 'status' => 404 ) );
		}
		
		// Check if post is published
		if ( $post->post_status !== 'publish' && ! current_user_can( 'edit_posts' ) ) {
			return new WP_Error( 'post_not_accessible', 'Post not accessible', array( 'status' => 403 ) );
		}
		
		return rest_ensure_response( array(
			'title' => get_the_title( $post ),
			'content' => apply_filters( 'the_content', $post->post_content ),
			'excerpt' => get_the_excerpt( $post ),
			'type' => 'post',
			'id' => $post->ID
		));
	}
endif;
