<?php
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

show_admin_bar(false);

function skills_widgets_init() {
	register_sidebar( array(
		'name'          => 'SKILLS',
		'id'            => 'skills',
		'description' => '',
		'class' => '',
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '',
		'after_title' => "",
	) );
}
add_action( 'widgets_init', 'skills_widgets_init' );

function form_widgets_init() {
	register_sidebar( array(
		'name'          => 'Form',
		'id'            => 'form',
		'description' => '',
		'class' => '',
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '',
		'after_title' => "",
	) );
}
add_action( 'widgets_init', 'form_widgets_init' );

function content1_widgets_init() {
	register_sidebar( array(
		'name'          => 'content1',
		'id'            => 'content1',
		'description' => '',
		'class' => '',
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '',
		'after_title' => "",
	) );
}
add_action( 'widgets_init', 'content1_widgets_init' );

function content2_widgets_init() {
	register_sidebar( array(
		'name'          => 'content2',
		'id'            => 'content2',
		'description' => '',
		'class' => '',
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '',
		'after_title' => "",
	) );
}
add_action( 'widgets_init', 'content2_widgets_init' );

function content3_widgets_init() {
	register_sidebar( array(
		'name'          => 'content3',
		'id'            => 'content3',
		'description' => '',
		'class' => '',
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '',
		'after_title' => "",
	) );
}
add_action( 'widgets_init', 'content3_widgets_init' );


register_nav_menus(array(
	'top_mnu' => 'Top Menu',
));

require_once (get_stylesheet_directory().'/theme-options.php');