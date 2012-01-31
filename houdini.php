<?php 
/*
Plugin Name: Houdini
Version: 0.0.1
Plugin URI: http://github.com/memuller/houdini
Description: Escapes undesired code anywhere.
Author: Matheus Muller
Author URI: http://memuller.com
*/

/*
Copyright (c) 2012, Matheus Muller

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

function destroy_tags($text, $tags = array('style', 'script', 'iframe', 'object', 'embed', 'applet', 'noscript', 'noembed', 'noframes')){
	$needles = array() ;
	foreach ($tags as $tag) {
		$needles[]= "@<".$tag."[^>]*?>.*?</".$tag.">@siu" ;
	}

	$text = preg_replace($needles, "", $text) ;	
	return $text;	
}

add_filter('the_title', 'destroy_tags') ;
add_filter('the_content', 'destroy_tags') ;
add_filter('the_author', 'destroy_tags') ;
 ?>