<?php

/*
Plugin Name: No Comic Sans, Dangit!
Plugin URI: http://goldenapplesdesign.com/projects/no-comic-sans-dangit/
Description: Just another way for despotic webmasters to control their users' content.
Author: Nathaniel Taintor
Version: 0.1
Author URI: http://goldenapplesdesign.com
*/



function no_ComicSans_dangit($text='') {
	$text = preg_replace('/(font-family:.*)Comic Sans MS.*([^"]*;)/iU',"",$text);
	$text = preg_replace('/face.*=[\'"].*Comic Sans.*[\'"]/iU','',$text);
	return $text;
}


register_activation_hook(__FILE__,'register_no_ComicSans');
function register_no_ComicSans() {
	update_option('ban_Comic_Sans',1);
}

register_deactivation_hook(__FILE__,'deregister_no_ComicSans');
function deregister_no_ComicSans() {
	delete_option('ban_Comic_Sans');
}

if (get_option('ban_Comic_Sans')) {
	add_filter('the_content','no_ComicSans_dangit',10,1);
}
	
	
?>