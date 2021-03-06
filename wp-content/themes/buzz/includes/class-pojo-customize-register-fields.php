<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Pojo_Buzz_Customize_Register_Fields {

	public function section_style( $sections = array() ) {
		$fields = array();

		$fields[] = array(
			'id'    => 'primary_color',
			'title' => __( 'Primary Color', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#34495e',
		);

		$fields[] = array(
			'id'    => 'secondary_color',
			'title' => __( 'Secondary Color', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#ecf0f1',
		);

		$fields[] = array(
			'id'    => 'primary_border_color',
			'title' => __( 'Border Color', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#7f8c8d',
		);

		$fields[] = array(
			'id'    => 'layout_content',
			'title' => __( 'Layout Content', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_SELECT,
			'choices' => array(
				'boxed' => __( 'Boxed', 'pojo' ),
				'wide' => __( 'Wide', 'pojo' ),
			),
			'std' => 'boxed',
		);

		$fields[] = array(
			'id'    => 'bg_body',
			'title' => __( 'Background Body (Boxed Mode)', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_BACKGROUND,
			'std' => array(
				'color' => '#ecf0f1',
				'image'  => '',
				'position'  => 'top center',
				'repeat' => 'repeat',
				'size' => 'auto',
				'attachment' => 'scroll',
			),
			'selector' => 'body',
			'change_type' => 'background',
		);

		$fields[] = array(
			'id'    => 'bg_primary',
			'title' => __( 'Background Content', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_BACKGROUND,
			'std' => array(
				'color' => '#FFFFFF',
				'image'  => '',
				'position'  => 'top center',
				'repeat' => 'repeat',
				'size' => 'auto',
				'attachment' => 'scroll',
			),
			'selector' => '#primary',
			'change_type' => 'background',
		);

		$fields[] = array(
			'id'    => 'button_typo',
			'title' => __( 'Button', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '15px',
				'family'  => 'Montserrat',
				'weight' => 'bold',
				'color' => '#ffffff',
				'transform' => 'uppercase',
				'line_height' => false, // Skip for that's value !
			),
			'selector' => 'button,.button,#commentform .button',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'button_typo_hover',
			'title' => __( 'Button - Hover', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#e74c3c',
			'selector' => 'button:hover,.button:hover,#commentform .button:hover',
			'change_type' => 'color',
		);

		$fields[] = array(
			'id'    => 'button_background',
			'title' => __( 'Button - Background', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#e74c3c',
			'selector' => 'button,.button,#commentform .button',
			'change_type' => 'bg_color',
		);

		$fields[] = array(
			'id'    => 'button_background_hover',
			'title' => __( 'Button - Background Hover', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#ffffff',
			'selector' => 'button:hover,.button:hover,#commentform .button:hover',
			'change_type' => 'bg_color',
		);

		$fields[] = array(
			'id'    => 'button_border',
			'title' => __( 'Button - Border', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#e74c3c',
			'selector' => 'button,.button,#commentform .button',
			'change_type' => 'border_color',
		);

		$fields[] = array(
			'id'    => 'button_border_hover',
			'title' => __( 'Button - Border Hover', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#e74c3c',
			'selector' => 'button:hover,.button:hover,#commentform .button:hover',
			'change_type' => 'border_color',
		);

		$sections[] = array(
			'id' => 'style',
			'title' => __( 'Style', 'pojo' ),
			'desc' => '',
			'fields' => $fields,
		);

		return $sections;
	}

	public function section_theme_colors( $sections ) {
		$fields = array();

		$colors = array(
			'#e74c3c',
			'#e67e22',
			'#f1c40f',
			'#1abc9c',
			'#2ecc71',
			'#3498db',
			'#9b59b6',
			'#34495e',
			'#95a5a6',
			'#ecf0f1',
		);

		foreach ( $colors as $color_index => $color_std ) {
			$color_id = $color_index + 1;
			$fields[] = array(
				'id'    => 'color_theme_' . $color_id,
				'title' => __( 'Color #' . $color_id, 'pojo' ),
				'type'  => Pojo_Theme_Customize::FIELD_COLOR,
				'std'   => $color_std,
			);

			$fields[] = array(
				'id'    => 'lbl_color_theme_' . $color_id,
				'title' => __( 'Color label #' . $color_id, 'pojo' ),
				'std'   => __( 'Color #' . $color_id, 'pojo' ),
			);
		}

		$sections[] = array(
			'id' => 'theme_colors',
			'title' => __( 'Theme Colors', 'pojo' ),
			'desc' => '',
			'fields' => $fields,
		);

		return $sections;
	}

	public function section_logo( $sections = array() ) {
		$fields = array();

		$fields[] = array(
			'id'    => 'typo_site_title',
			'title' => __( 'Site Name', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '44px',
				'family'  => 'Montserrat',
				'weight' => 'bold',
				'color' => '#34495e',
				'line_height' => '1',
			),
			'selector' => 'div.logo-text a',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'image_logo',
			'title' => __( 'Choose Logo', 'pojo' ),
			'type' => Pojo_Theme_Customize::FIELD_IMAGE,
			'std'   => get_template_directory_uri() . '/assets/images/logo.png',
		);

		$fields[] = array(
			'id'    => 'image_logo_margin_top',
			'title' => __( 'Logo Margin Top', 'pojo' ),
			'std'   => '30px',
			'selector' => '.logo',
			'change_type' => 'margin_top',
		);

		$fields[] = array(
			'id'    => 'image_logo_margin_bottom',
			'title' => __( 'Logo Margin Bottom', 'pojo' ),
			'std'   => '30px',
			'selector' => '.logo',
			'change_type' => 'margin_bottom',
		);

		$fields[] = array(
			'id'    => 'image_sticky_header_logo',
			'title' => __( 'Logo Sticky Header (and Mobile)', 'pojo' ),
			'type' => Pojo_Theme_Customize::FIELD_IMAGE,
			'std'   => get_template_directory_uri() . '/assets/images/logo.png',
		);

		$sections[] = array(
			'id' => 'logo',
			'title' => __( 'Logo', 'pojo' ),
			'desc' => '',
			'fields' => $fields,
		);

		return $sections;
	}

	public function section_top_bar( $sections = array() ) {
		$fields = array();

		$fields[] = array(
			'id' => 'bg_top_bar',
			'title' => __( 'Background', 'pojo' ),
			'type' => Pojo_Theme_Customize::FIELD_BACKGROUND,
			'std' => array(
				'color' => '#2c3e50',
				'image'  => '',
				'position'  => 'top center',
				'repeat' => 'repeat-x',
				'size' => 'auto',
				'attachment' => 'scroll',
			),
			'skip_transport' => true,
			'selector' => '#top-bar',
			'change_type' => 'background',
		);

		$fields[] = array(
			'id'    => 'typo_top_bar',
			'title' => __( 'Text', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '12px',
				'family'  => 'Open Sans',
				'weight' => '600',
				'color' => '#ecf0f1',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '45px',
				'letter_spacing' => '0px',
			),
			'selector' => '#top-bar, #top-bar .widget-title',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'color_link_top_bar',
			'title' => __( 'Link', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#ecf0f1',
			'selector' => '#top-bar a',
			'change_type' => 'color',
		);

		$fields[] = array(
			'id'    => 'color_link_hover_top_bar',
			'title' => __( 'Link Hover', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#e74c3c',
			'selector' => '#top-bar a:hover',
			'change_type' => 'color',
			'skip_transport' => true,
		);

		$sections[] = array(
			'id' => 'top_bar',
			'title' => __( 'Top Bar', 'pojo' ),
			'desc' => '',
			'fields' => $fields,
		);

		return $sections;
	}

	public function section_header( $sections = array() ) {
		$fields = array();

		$fields[] = array(
			'id' => 'bg_header',
			'title' => __( 'Background', 'pojo' ),
			'type' => Pojo_Theme_Customize::FIELD_BACKGROUND,
			'std' => array(
				'color' => '#ffffff',
				'image'  => '',
				'position'  => 'top center',
				'repeat' => 'repeat-x',
				'size' => 'auto',
				'attachment' => 'scroll',
			),
			'skip_transport' => true,
			'selector' => '#header, .sticky-header',
			'change_type' => 'background',
		);

		$fields[] = array(
			'id'    => 'header_layout',
			'title' => __( 'Header Layout', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_SELECT,
			'choices' => array(
				'logo_left' => __( 'Logo Left - Menu Right', 'pojo' ),
				'logo_right' => __( 'Menu Left - Logo Right', 'pojo' ),
			),
			'std' => 'logo_left',
			'skip_transport' => true,
		);

		$fields[] = array(
			'id' => 'chk_enable_sticky_header',
			'title' => __( 'Sticky Header', 'pojo' ),
			'type' => Pojo_Theme_Customize::FIELD_CHECKBOX,
			'std' => true,
		);

		$sections[] = array(
			'id' => 'header',
			'title' => __( 'Header', 'pojo' ),
			'desc' => '',
			'fields' => $fields,
		);

		return $sections;
	}

	public function section_menus( $sections = array() ) {
		$fields = array();

		$fields = apply_filters( 'pojo_customizer_section_menus_before', $fields );

		$fields[] = array(
			'id' => 'height_menu',
			'title' => __( 'Height', 'pojo' ),
			'std' => '90px',
		);

		$fields[] = array(
			'id'    => 'typo_menu_primary',
			'title' => __( 'Menu Primary', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '15px',
				'family'  => 'Montserrat',
				'weight' => '400',
				'transform' => 'uppercase',
				'color' => '#2c3e50',
				'letter-spacing' => '1px',
				'line_height' => false, // Skip for that's value !
			),
			'selector' => '.sf-menu a, .mobile-menu a',
			'change_type' => 'typography',
			'skip_transport' => true,
		);

		$fields[] = array(
			'id'    => 'color_menu_primary_hover',
			'title' => __( 'Menu Hover', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#e74c3c',
			'selector' => '.sf-menu a:hover,.sf-menu li.active a, .sf-menu li.current-menu-item > a,.sf-menu .sfHover > a,.sf-menu .sfHover > li.current-menu-item > a,.sf-menu li.current-menu-ancestor > a,.mobile-menu a:hover,.mobile-menu li.current-menu-item > a, a.search-toggle .fa-times',
			'change_type' => 'color',
			'skip_transport' => true,
		);

		$fields[] = array(
			'id'    => 'color_bg_sub_menu',
			'title' => __( 'Sub Menu - Background', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std' => '#2c3e50',
			'selector' => '.nav-main .sf-menu .sub-menu',
			'change_type' => 'bg_color',
		);

		$fields[] = array(
			'id'    => 'color_bg_sub_menu_hover',
			'title' => __( 'Sub Menu - Background Hover', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std' => '#e74c3c',
			'selector' => '.nav-main .sf-menu .sub-menu li:hover > a,.nav-main .sf-menu .sub-menu li.current-menu-item > a',
			'change_type' => 'bg_color',
		);

		$fields[] = array(
			'id'    => 'typo_sub_menu_link',
			'title' => __( 'Sub Menu', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '13px',
				'family'  => 'Roboto',
				'weight' => '400',
				'color' => '#ecf0f1',
				'transform' => 'capitalize',
				'line_height' => '3.3em',
			),
			'selector' => '.nav-main .sf-menu .sub-menu li a',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'color_sub_menu_link_hover',
			'title' => __( 'Sub Menu - Hover', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#ecf0f1',
			'selector' => '.nav-main .sf-menu .sub-menu li:hover > a,.nav-main .sf-menu .sub-menu li.current-menu-item > a',
			'change_type' => 'color',
			'skip_transport' => true,
		);

		$fields = apply_filters( 'pojo_customizer_section_menus_after', $fields );

		$sections[] = array(
			'id' => 'menus',
			'title' => __( 'Navigation', 'pojo' ),
			'desc' => '',
			'fields' => $fields,
		);

		return $sections;
	}

	public function section_search_bar( $sections = array() ) {
		$fields = array();

		$fields[] = array(
			'id' => 'bg_search_bar',
			'title' => __( 'Background', 'pojo' ),
			'type' => Pojo_Theme_Customize::FIELD_BACKGROUND,
			'std' => array(
				'color' => '#e74c3c',
				'image'  => '',
				'position'  => 'top center',
				'repeat' => 'repeat-x',
				'size' => 'auto',
				'attachment' => 'scroll',
			),
			'skip_transport' => true,
			'selector' => '.search-section',
			'change_type' => 'background',
		);

		$fields[] = array(
			'id'    => 'color_search_field',
			'title' => __( 'Color Field', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#ecf0f1',
			'selector' => '.search-section,.search-section .form-search .field',
			'change_type' => 'color',
			'skip_transport' => true,
		);

		$fields[] = array(
			'id'    => 'chk_enable_menu_search',
			'title' => __( 'Add Search Button to Primary Menu', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_CHECKBOX,
			'std'   => true,
		);

		$sections[] = array(
			'id' => 'search_bar',
			'title' => __( 'Search Bar', 'pojo' ),
			'desc' => '',
			'fields' => $fields,
		);

		return $sections;
	}

	public function section_sub_header( $sections = array() ) {
		$fields = array();

		$fields[] = array(
			'id' => 'bg_sub_header',
			'title' => __( 'Background', 'pojo' ),
			'type' => Pojo_Theme_Customize::FIELD_BACKGROUND,
			'std' => array(
				'color' => '#ecf0f1',
				'image'  => '',
				'position'  => 'top center',
				'repeat' => 'repeat-x',
				'size' => 'auto',
				'attachment' => 'scroll',
			),
			'skip_transport' => true,
			'selector' => '#sub-header',
			'change_type' => 'background',
		);


		$fields[] = array(
			'id'    => 'typo_sub_header',
			'title' => __( 'Text', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '13px',
				'family'  => 'Droid Serif',
				'weight' => 'normal',
				'transform' => 'none',
				'style' => 'italic',
				'color' => '#6b7677',
				'line_height' => '70px',
				'letter_spacing' => '1.5px',
			),
			'selector' => '#sub-header, #sub-header .widget-title',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'color_link_sub_header',
			'title' => __( 'Link', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#7f8c8d',
			'selector' => '#sub-header a',
			'change_type' => 'color',
		);

		$fields[] = array(
			'id'    => 'color_link_hover_sub_header',
			'title' => __( 'Link Hover', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#e74c3c',
			'selector' => '#sub-header a:hover',
			'change_type' => 'color',
			'skip_transport' => true,
		);

		$sections[] = array(
			'id' => 'sub_header',
			'title' => __( 'Sub Header', 'pojo' ),
			'desc' => '',
			'fields' => $fields,
		);

		return $sections;
	}

	public function section_title_bar( $sections = array() ) {
		$fields = array();

		$fields[] = array(
			'id'    => 'height_title_bar',
			'title' => __( 'Height', 'pojo' ),
			'std'   => '100px',
			'selector' => '#title-bar',
			'change_type' => 'height',
		);

		$fields[] = array(
			'id' => 'background_title_bar',
			'title' => __( 'Background', 'pojo' ),
			'type' => Pojo_Theme_Customize::FIELD_BACKGROUND,
			'std' => array(
				'color' => '#ecf0f1',
				'image'  => '',
				'position'  => 'center center',
				'repeat' => 'repeat',
				'size' => 'cover',
				'attachment' => 'scroll',
			),
			'selector' => '#title-bar.title-bar-style-custom_bg',
			'change_type' => 'background',
		);

		$fields[] = array(
			'id'    => 'typo_title_title_bar',
			'title' => __( 'Title', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '17px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#7f8c8d',
				'transform' => 'uppercase',
				'line_height' => false, // Skip for that's value !
				),
			'selector' => '#title-bar',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_breadcrumbs_title_bar',
			'title' => __( 'Breadcrumbs', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '11px',
				'family'  => 'Droid Serif',
				'weight' => 'normal',
				'color' => '#7f8c8d',
				'style' => 'italic',
				'transform' => 'uppercase',
				'line_height' => false, // Skip for that's value !
				'letter_spacing' => '1.2px',
			),
			'selector' => '#title-bar div.breadcrumbs, #title-bar div.breadcrumbs a',
			'change_type' => 'typography',
		);

		$sections[] = array(
			'id' => 'title_bar',
			'title' => __( 'Title Bar', 'pojo' ),
			'desc' => '',
			'fields' => $fields,
		);

		return $sections;
	}

	public function section_typography( $sections = array() ) {
		$fields = array();

		$fields[] = array(
			'id'    => 'typo_body_text',
			'title' => __( 'Body Text', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '15px',
				'family'  => 'Roboto',
				'weight' => 'normal',
				'color' => '#5e5e5e',
				'line_height' => '1.9em',
			),
			'selector' => 'body',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'color_link',
			'title' => __( 'Link', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#95a5a6',
			'selector' => 'a',
			'change_type' => 'color',
			'skip_transport' => true,
		);

		$fields[] = array(
			'id'    => 'color_link_hover',
			'title' => __( 'Link Hover', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#e74c3c',
			'selector' => 'a:hover, a:focus',
			'change_type' => 'color',
			'skip_transport' => true,
		);

		$fields[] = array(
			'id'    => 'color_text_selection',
			'title' => __( 'Text Selection', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#ffffff',
			'selector' => 'selection',
			'change_type' => 'text_selection',
		);

		$fields[] = array(
			'id'    => 'color_text_bg_selection',
			'title' => __( 'Text Background Selection', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#e74c3c',
			'selector' => 'selection',
			'change_type' => 'bg_selection',
		);

		$fields[] = array(
			'id'    => 'typo_h1',
			'title' => __( 'H1 - Page Title', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '33px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#2c3e50',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '1.3em',
				'letter-spacing' => '0px',
			),
			'selector' => 'h1',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_h2',
			'title' => __( 'H2', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '32px',
				'family'  => 'Montserrat',
				'weight' => '200',
				'color' => '#2c3e50',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '1.3em',
				'letter-spacing' => '0px',
			),
			'selector' => 'h2',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_h3',
			'title' => __( 'H3', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '18px',
				'family'  => 'Droid Serif',
				'weight' => 'normal',
				'color' => '#2c3e50',
				'style' => 'italic',
				'transform' => 'none',
				'line_height' => '31px',
				'letter-spacing' => '0px',
			),
			'selector' => 'h3',
			'change_type' => 'typography',
		);


		$fields[] = array(
			'id'    => 'typo_h4',
			'title' => __( 'H4', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '17px',
				'family'  => 'Montserrat',
				'weight' => 'bold',
				'color' => '#2c3e50',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '1.2em',
				'letter-spacing' => '0px',
			),
			'selector' => 'h4',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_h5',
			'title' => __( 'H5', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '15px',
				'family'  => 'Montserrat',
				'weight' => 'bold',
				'color' => '#7f8c8d',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '1.2em',
				'letter-spacing' => '1.2px',
			),
			'selector' => 'h5',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_h6',
			'title' => __( 'H6', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '17px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#e74c3c',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '1.5em',
				'letter-spacing' => '0px',
			),
			'selector' => 'h6',
			'change_type' => 'typography',
		);

		$sections[] = array(
			'id' => 'typography',
			'title' => __( 'Typography', 'pojo' ),
			'desc' => '',
			'fields' => $fields,
		);

		return $sections;
	}

	public function section_content( $sections = array() ) {
		$fields = array();

		$fields[] = array(
			'id'    => 'typo_heading_list',
			'title' => __( 'Heading - List', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '21px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#2c3e50',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '1.2em',
				'letter-spacing' => '0px',
			),
			'selector' => 'h3.media-heading',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_heading_list_two',
			'title' => __( 'Heading - List Two', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '16px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#2c3e50',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '1.2em',
				'letter-spacing' => '0px',
			),
			'selector' => '.media.list-two h3.media-heading',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_heading_list_Three',
			'title' => __( 'Heading - List Three', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '15px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#2c3e50',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '1.2em',
				'letter-spacing' => '0px',
			),
			'selector' => '.media.list-three h3.media-heading',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_heading_list_format',
			'title' => __( 'Heading - List Format', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '27px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#2c3e50',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '30px',
				'letter-spacing' => '0px',
			),
			'selector' => '.media.list-format h3.media-heading',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_heading_grid_one',
			'title' => __( 'Heading - Grid One', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '20px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#2c3e50',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '1.2em',
				'letter-spacing' => '0px',
			),
			'selector' => '.grid-item.grid-one h4.grid-heading',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_heading_grid_two',
			'title' => __( 'Heading - Grid Two', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '21px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#2c3e50',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '1.2em',
				'letter-spacing' => '0px',
			),
			'selector' => '.grid-item.grid-two h4.grid-heading',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_heading_grid_three',
			'title' => __( 'Heading - Grid Three', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '17px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#2c3e50',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '1.3em',
				'letter-spacing' => '0px',
			),
			'selector' => '.grid-item.grid-three h4.grid-heading',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_heading_grid_four',
			'title' => __( 'Heading - Grid Four', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '15px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#2c3e50',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '1.2em',
				'letter-spacing' => '0px',
			),
			'selector' => '.grid-item.grid-four h4.grid-heading',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'text_color_grid_cover',
			'title' => __( 'Grid Cover - Text Color', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#ffffff',
			'selector' => '.grid-item.cover-item .caption .grid-heading,.grid-item.cover-item .caption .entry-meta span,.grid-item.cover-item .caption .entry-excerpt p,.grid-item.cover-item .caption .read-more',
			'change_type' => 'color',
		);

		$fields[] = array(
			'id'    => 'typo_heading_posts_group_featured',
			'title' => __( 'Heading - Posts Group (Featured)', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '21px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#2c3e50',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '1.2em',
				'letter-spacing' => '0px',
			),
			'selector' => '.posts-group .featured-post h3.media-heading,.posts-group .featured-post h3.grid-heading',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_heading_posts_group',
			'title' => __( 'Heading - Posts Group', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '15px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#2c3e50',
				'style' => 'normal',
				'transform' => 'uppercase',
				'line_height' => '20px',
				'letter-spacing' => '0px',
			),
			'selector' => '.posts-group h3.media-heading,.posts-group h4.grid-heading',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_meta_data_archive',
			'title' => __( 'Meta Data - Archive', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '11px',
				'family'  => 'Droid Serif',
				'weight' => 'bold',
				'color' => '#95a5a6',
				'transform' => 'none',
				'style' => 'italic',
				'line_height' => false, // Skip for that's value !
				'letter-spacing' => '0px',
			),
			'selector' => '.entry-meta > span, .more-link span,.read-more',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_meta_data_single',
			'title' => __( 'Meta Data - Single', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '11px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#95a5a6',
				'transform' => 'none',
				'style' => 'normal',
				'line_height' => '1em',
				'letter-spacing' => '0px',
			),
			'selector' => '.entry-post .entry-meta > span',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_excerpt_archive',
			'title' => __( 'Excerpt - Archive', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '15px',
				'family'  => 'Roboto',
				'weight' => 'normal',
				'color' => '#5e5e5e',
				'transform' => 'none',
				'style' => 'normal',
				'line_height' => '1.3em',
				'letter-spacing' => '0px',
			),
			'selector' => '.entry-excerpt',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_excerpt_single',
			'title' => __( 'Excerpt - Single', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '17px',
				'family'  => 'Roboto',
				'weight' => 'bold',
				'color' => '#5e5e5e',
				'transform' => 'none',
				'style' => 'italic',
				'line_height' => '20px',
				'letter-spacing' => '0px',
			),
			'selector' => '.entry-post .entry-excerpt',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_category_label',
			'title' => __( 'Category Label', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '11px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#ffffff',
				'transform' => 'uppercase',
				'style' => 'normal',
				'letter-spacing' => '0px',
				'line_height' => false, // Skip for that's value !
			),
			'selector' => '.category-label',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'typo_nav_breadcrumbs',
			'title' => __( 'Breadcrumbs & Navigation', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '11px',
				'family'  => 'Droid Serif',
				'weight' => 'bold',
				'color' => '#7f8c8d',
				'transform' => 'none',
				'style' => 'italic',
				'line_height' => '2em',
				'letter-spacing' => '0px',
			),
			'selector' => '#primary #breadcrumbs,#primary #breadcrumbs a, nav.post-navigation',
			'change_type' => 'typography',
		);

		$sections[] = array(
			'id' => 'content',
			'title'      => __( 'Content', 'pojo' ),
			'desc'       => '',
			'fields'     => $fields,
		);

		return $sections;
	}

	public function section_sidebar( $sections = array() ) {
		$fields = array();

		$fields[] = array(
			'id'    => 'typo_sidebar_text',
			'title' => __( 'Text', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '15px',
				'family'  => 'Roboto',
				'weight' => 'normal',
				'color' => '#5e5e5e',
				'transform' => 'none',
				'style' => 'normal',
				'line_height' => '21px',
				'letter-spacing' => '0px',
			),
			'selector' => '#sidebar',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'color_sidebar_link',
			'title' => __( 'Link', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#5e5e5e',
			'selector' => '#sidebar a',
			'change_type' => 'color',
		);

		$fields[] = array(
			'id'    => 'color_sidebar_link_hover',
			'title' => __( 'Link Hover', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#e74c3c',
			'selector' => '#sidebar a:hover',
			'change_type' => 'color',
			'skip_transport' => true,
		);

		$fields[] = array(
			'id'    => 'typo_sidebar_widget_title',
			'title' => __( 'Widget Title', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '15px',
				'family'  => 'Montserrat',
				'weight' => 'bold',
				'color' => '#7f8c8d',
				'transform' => 'uppercase',
				'style' => 'normal',
				'line_height' => '1',
				'letter-spacing' => '0px',
			),
			'selector' => '#sidebar .widget-title',
			'change_type' => 'typography',
		);

		$sections[] = array(
			'id' => 'sidebar',
			'title' => __( 'Sidebar', 'pojo' ),
			'desc' => '',
			'fields' => $fields,
		);

		return $sections;
	}

	public function section_footer_widgets( $sections = array() ) {
		$fields = array();

		$fields[] = array(
			'id'    => 'bg_footer_widgets',
			'title' => __( 'Background', 'pojo' ),
			'type' => Pojo_Theme_Customize::FIELD_BACKGROUND,
			'std' => array(
				'color' => '#2c3e50',
				'image'  => '',
				'position'  => 'top center',
				'repeat' => 'repeat',
				'size' => 'auto',
				'attachment' => 'scroll',
			),
			'selector' => '#footer-widgets',
			'change_type' => 'background',
		);

		$fields[] = array(
			'id'    => 'typo_text_footer_widgets',
			'title' => __( 'Text', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '14px',
				'family'  => 'Roboto',
				'weight' => 'normal',
				'color' => '#ecf0f1',
				'transform' => 'none',
				'style' => 'normal',
				'line_height' => '1.5em',
				'letter-spacing' => '0px',
			),
			'selector' => '#footer-widgets',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'color_link_footer_widgets',
			'title' => __( 'Link', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#ecf0f1',
			'selector' => '#footer-widgets a',
			'change_type' => 'color',
		);

		$fields[] = array(
			'id'    => 'color_link_hover_footer_widgets',
			'title' => __( 'Link Hover', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#e74c3c',
			'selector' => '#footer-widgets a:hover',
			'change_type' => 'color',
			'skip_transport' => true,
		);

		$fields[] = array(
			'id'    => 'typo_title_footer_widgets',
			'title' => __( 'Widget Title', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '17px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#e74c3c',
				'transform' => 'uppercase',
				'style' => 'normal',
				'line_height' => '2',
				'letter-spacing' => '0px',
			),
			'selector' => '#footer-widgets .widget-title',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'footer_widgets_columns',
			'title' => __( 'Widget Columns', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_SELECT,
			'choices' => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
			),
			'std' => '4',
		);

		$sections[] = array(
			'id' => 'footer_widgets',
			'title' => __( 'Footer Widgets', 'pojo' ),
			'desc' => '',
			'fields' => $fields,
		);

		return $sections;
	}

	public function section_footer_copyright( $sections = array() ) {
		$fields = array();

		$fields[] = array(
			'id'    => 'bg_footer_copyright',
			'title' => __( 'Background', 'pojo' ),
			'type' => Pojo_Theme_Customize::FIELD_BACKGROUND,
			'std' => array(
				'color' => '#2c3e50',
				'image'  => '',
				'position'  => 'top center',
				'repeat' => 'repeat',
				'size' => 'auto',
				'attachment' => 'scroll',
			),
			'selector' => '#footer-copyright',
			'change_type' => 'background',
		);

		$fields[] = array(
			'id'    => 'footer_copyright_border_color',
			'title' => __( 'Border Top Color', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#7f8c8d',
		);

		$fields[] = array(
			'id'    => 'typo_text_footer',
			'title' => __( 'Text', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_TYPOGRAPHY,
			'std'   => array(
				'size'  => '10px',
				'family'  => 'Montserrat',
				'weight' => 'normal',
				'color' => '#ecf0f1',
				'transform' => 'uppercase',
				'style' => 'normal',
				'line_height' => '70px',
				'letter-spacing' => '0px',
			),
			'selector' => '#footer-copyright',
			'change_type' => 'typography',
		);

		$fields[] = array(
			'id'    => 'footer_copyright_color_link',
			'title' => __( 'Link', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#ecf0f1',
			'selector' => '#footer-copyright a',
			'change_type' => 'color',
		);

		$fields[] = array(
			'id'    => 'footer_copyright_color_link_hover',
			'title' => __( 'Link Hover', 'pojo' ),
			'type'  => Pojo_Theme_Customize::FIELD_COLOR,
			'std'   => '#ffffff',
			'selector' => '#footer-copyright a:hover',
			'change_type' => 'color',
			'skip_transport' => true,
		);

		$sections[] = array(
			'id' => 'footer',
			'title' => __( 'Footer Copyright', 'pojo' ),
			'desc' => '',
			'fields' => $fields,
		);

		return $sections;
	}

	public function pojo_wp_head_custom_css_code( Pojo_Create_CSS_Code $css_code ) {
		$primary_color   = get_theme_mod( 'primary_color' );
		$secondary_color = get_theme_mod( 'secondary_color' );

		if ( $primary_color && $secondary_color ) {
			$primary_color_rgba = implode( ',', pojo_hex2rgb( $primary_color ) );

			$string = <<<CSSCODE
			.category-label {background-color: rgba({$primary_color_rgba},0.8);}
			#primary .widget-inner .pb-widget-title span:before,#primary .pb-widget-inner .pb-widget-title span:before,#primary .widget-inner .widget-title span:after,#primary .pb-widget-inner .widget-title span:after  {background-color:  {$primary_color};}
			#primary .widget-inner .pb-widget-title span:before,#primary .pb-widget-inner .pb-widget-title span:before,#primary .widget-inner .widget-title span:after,#primary .pb-widget-inner .widget-title span:after  {background-color:  {$primary_color};}
			.align-pagination .pagination > li > a:hover,.align-pagination .pagination > li > span:hover,.align-pagination .pagination > .active > a,.align-pagination .pagination > .active > span,.align-pagination .pagination > .active > a:hover,.align-pagination .pagination > .active > span:hover,.align-pagination .pagination > .active > a:focus,.align-pagination .pagination > .active > span:focus {background-color: {$secondary_color}; color: {$primary_color};}
			.entry-tags a {background-color: {$secondary_color};}
			.entry-tags a:hover {background-color: {$primary_color}; color: {$secondary_color};}
			.author-info {background-color: {$primary_color};color: {$secondary_color};}
			.author-info .author-link, .author-info h3,.author-info h4,.author-info h4 small {color: {$secondary_color};}
			.category-filters li a {color: {$secondary_color};}
			.category-filters li a:hover,.category-filters li a.active {color: {$primary_color};}
			.navbar-toggle:hover .icon-bar, .navbar-toggle:focus .icon-bar {background-color: {$primary_color};}
			#comments,#respond {background-color: {$secondary_color};}
			#primary .widget .widget-title span:after, #primary .pb-widget-inner .pb-widget-title span:before {background-color: {$primary_color};}
CSSCODE;

			foreach ( range( 1, 10 ) as $color_id ) {
				$color = get_theme_mod( 'color_theme_' . $color_id );
				if ( empty( $color ) )
					continue;

				$color_rgba = implode( ',', pojo_hex2rgb( $color ) );
				$string .= <<<CSSCODE
.sf-menu > li.theme-color-{$color_id}.active > a > span, .sf-menu > li.theme-color-{$color_id}:hover > a > span, .sf-menu > li.theme-color-{$color_id}.current-menu-item > a > span, .sf-menu > li.theme-color-{$color_id}.current-menu-parent > a > span, .sf-menu > li.theme-color-{$color_id}.current-menu-ancestor > a > span, .sf-menu > li.theme-color-{$color_id}.current_page_item > a > span, .sf-menu > li.theme-color-{$color_id}.current_page_paren > a > span, .sf-menu > li.theme-color-{$color_id}.current_page_ancestor > a > span {color: {$color};}
			#primary .theme-color-{$color_id} .category-label {background-color: rgba({$color_rgba}, 0.8);}
			#primary .theme-color-{$color_id} .widget-inner .pb-widget-title span:before,#primary .theme-color-{$color_id} .pb-widget-inner .pb-widget-title span:after,#primary .theme-color-{$color_id} .widget-title span:after,#primary .theme-color-{$color_id} .pb-widget-inner .widget-title span:after {background-color: {$color};}
CSSCODE;
			}

			$css_code->add_data( $string );

		} // End style colors

		$option = get_theme_mod( 'primary_border_color' );
		if ( ! empty( $option ) ) {
			$css_code->add_value( '#primary #main.sidebar-right,#primary #main.sidebar-left,.align-pagination .pagination,.single .entry-post .entry-meta, body.rtl #primary #main.sidebar-right,body.rtl #primary #main.sidebar-left,.media.grid-item.list-two:nth-child(n+3) .item-inner,.media.grid-item.list-three:nth-child(n+4) .item-inner,.posts-group .grid-item.media.featured-post .item-inner,.posts-group .grid-item.media.list-item:nth-child(n+4) .item-inner,.posts-group.featured-list-aside .media.list-item:nth-child(n+3) .item-inner,nav.post-navigation,.commentlist li', 'border-color', $option );
		}

		$option = get_theme_mod( 'footer_copyright_border_color' );
		if ( ! empty( $option ) ) {
			$css_code->add_value( '#footer-copyright .content-copyright', 'border-color', $option );
		}

		$option = get_theme_mod( 'height_menu', '90px' );
		$css_code->add_value( '.sf-menu a, .menu-no-found,.sf-menu li.pojo-menu-search,.search-header', 'line-height', $option );
		$css_code->add_value( '.sf-menu li:hover ul, .sf-menu li.sfHover ul', 'top', $option );

		$option = get_theme_mod( 'typo_menu_primary' );
		if ( ! empty( $option['color'] ) ) {
			$css_code->add_value( 'a.search-toggle', 'color', $option['color'] );
			$css_code->add_value( '.navbar-toggle', 'border-color', $option['color'] );
			$css_code->add_value( '.icon-bar', 'background-color', $option['color'] );
		}

		$option = get_theme_mod( 'typo_top_bar' );
		if ( ! empty( $option ) ) {
			$css_code->add_value( '#top-bar ul.social-links li a .social-icon:before', 'line-height', $option['line_height'] );
			$css_code->add_value( '#top-bar ul.social-links li a .social-icon:before', 'height', $option['line_height'] );
			$css_code->add_value( '#top-bar ul.social-links li a .social-icon:before', 'width', $option['line_height'] );
		}

		$option = get_theme_mod( 'typo_sub_header' );
		if ( ! empty( $option ) ) {
			$css_code->add_value( '#sub-header ul.social-links li a .social-icon:before', 'line-height', $option['line_height'] );
			$css_code->add_value( '#sub-header ul.social-links li a .social-icon:before', 'height', $option['line_height'] );
			$css_code->add_value( '#sub-header ul.social-links li a .social-icon:before', 'width', $option['line_height'] );
		}

		$css_code->add_value( '.search-section .form-search .button', 'color', get_theme_mod( 'color_search_button' ) );
	}

	public function __construct() {
		add_filter( 'pojo_register_customize_sections', array( &$this, 'section_style' ), 100 );
		add_filter( 'pojo_register_customize_sections', array( &$this, 'section_theme_colors' ), 100 );
		add_filter( 'pojo_register_customize_sections', array( &$this, 'section_logo' ), 110 );
		add_filter( 'pojo_register_customize_sections', array( &$this, 'section_top_bar' ), 120 );
		add_filter( 'pojo_register_customize_sections', array( &$this, 'section_header' ), 125 );
		add_filter( 'pojo_register_customize_sections', array( &$this, 'section_menus' ), 130 );
		add_filter( 'pojo_register_customize_sections', array( &$this, 'section_search_bar' ), 140 );
		add_filter( 'pojo_register_customize_sections', array( &$this, 'section_sub_header' ), 145 );
		add_filter( 'pojo_register_customize_sections', array( &$this, 'section_title_bar' ), 150 );
		add_filter( 'pojo_register_customize_sections', array( &$this, 'section_typography' ), 160 );
		add_filter( 'pojo_register_customize_sections', array( &$this, 'section_content' ), 165 );
		add_filter( 'pojo_register_customize_sections', array( &$this, 'section_sidebar' ), 170 );
		add_filter( 'pojo_register_customize_sections', array( &$this, 'section_footer_widgets' ), 180 );
		add_filter( 'pojo_register_customize_sections', array( &$this, 'section_footer_copyright' ), 190 );

		add_filter( 'pojo_wp_head_custom_css_code', array( &$this, 'pojo_wp_head_custom_css_code' ) );
	}

}
new Pojo_Buzz_Customize_Register_Fields();