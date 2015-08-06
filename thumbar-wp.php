<?php
/*
Plugin Name: Thumbar
Plugin URI: https://www.thumbar.com/plugin/thumbar-wp.zip
Description: Rates your posts and mirrors them and their ratings in real time for free at Thumbar.com to maximize their exposure. Replaces search engines and SEO for generating traffic.
Version: 1.0
Author: Thumbar, Inc.
Author URI: https://www.thumbar.com
*/

add_filter('the_content', 'thumbar');
add_action('init', 'register_tb_script');
add_action('wp_footer', 'print_tb_script');

function thumbar($content) {
	global $add_tb_script;

	$thumbar_add_on = '<style type="text/css"> .thumbar {margin:0px;border:0px;padding:0px;width:150px;height:25px;}</style><div class="thumbar" uid="x"></div><br>';
	$theContent = $content.$thumbar_add_on;
	$add_tb_script = true;

	return ($theContent);
}

function register_tb_script() {
	wp_register_script('tb-script', 'https://www.thumbar.com/js/wp_link.js', array('jquery'), '1.0', true);
}

function print_tb_script() {
	global $add_tb_script;

	while (!$add_tb_script)
		return;

	wp_print_scripts('tb-script');
}
?>