<?php
/**
 * Rookie Theme Customizer
 *
 * @package Rookie
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rookie_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    /**
     * Content Background Color
     */
    $wp_customize->add_setting( 'rookie_content_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'content', array(
        'label'    => __('Content Background Color', 'rookie'),
        'section'  => 'colors',
        'settings' => 'rookie_content_color',
    ) ) );

	/**
	 * Primary Color
	 */
    $wp_customize->add_setting( 'sportspress_frontend_css_colors[primary]', array(
        'default'           => '#2b353e',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'primary', array(
        'label'    => __('Primary Color', 'rookie'),
        'section'  => 'colors',
        'settings' => 'sportspress_frontend_css_colors[primary]',
    ) ) );

	/**
	 * Widget Background Color
	 */
    $wp_customize->add_setting( 'sportspress_frontend_css_colors[background]', array(
        'default'           => '#f4f4f4',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'background', array(
        'label'    => __('Widget Background Color', 'rookie'),
        'section'  => 'colors',
        'settings' => 'sportspress_frontend_css_colors[background]',
    ) ) );

	/**
	 * Text Color
	 */
    $wp_customize->add_setting( 'sportspress_frontend_css_colors[text]', array(
        'default'           => '#222222',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'text', array(
        'label'    => __('Text Color', 'rookie'),
        'section'  => 'colors',
        'settings' => 'sportspress_frontend_css_colors[text]',
    ) ) );

	/**
	 * Widget Heading Color
	 */
    $wp_customize->add_setting( 'sportspress_frontend_css_colors[heading]', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'heading', array(
        'label'    => __('Widget Heading Color', 'rookie'),
        'section'  => 'colors',
        'settings' => 'sportspress_frontend_css_colors[heading]',
    ) ) );

	/**
	 * Link Color
	 */
    $wp_customize->add_setting( 'sportspress_frontend_css_colors[link]', array(
        'default'           => '#00a69c',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link', array(
        'label'    => __('Link Color', 'rookie'),
        'section'  => 'colors',
        'settings' => 'sportspress_frontend_css_colors[link]',
    ) ) );
}
add_action( 'customize_register', 'rookie_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rookie_customize_preview_js() {
	wp_enqueue_script( 'rookie_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20141204', true );
}
add_action( 'customize_preview_init', 'rookie_customize_preview_js' );
