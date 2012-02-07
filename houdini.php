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


	$plugin_path = plugin_dir_path(__FILE__) ;

	require 'vendors/htmlpurifier/library/HTMLPurifier.standalone.php' ;
	require 'vendors/haml/HamlParser.class.php' ;
	require 'models/Escape.php' ;
	require 'lib/Presenter.php' ;
	require 'presenters/Options.php' ;

	add_filter('title_save_pre', array('Houdini\Escape', 'common')) ;
	add_filter('content_save_pre', array('Houdini\Escape', 'common'));
	add_filter('excerpt_save_pre', array('Houdini\Escape', 'common')) ;
	add_filter('the_title', array('Houdini\Escape', 'common')) ;
	add_filter('the_content', array('Houdini\Escape', 'common')) ;
	add_filter('the_author', array('Houdini\Escape', 'common')) ;

	function houdini_options_menu(){
		add_submenu_page( 'options-general.php', 'Houdini Settings', 'Houdini', 'edit_posts', 'houdini', 'Houdini\OptionsPresenter::present'  );
	}
	add_action( 'admin_menu', 'houdini_options_menu' ) ;

?>