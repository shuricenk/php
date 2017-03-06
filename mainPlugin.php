<?php
/*
Plugin Name: mainPlugins
Plugin URI: https://codex.wordpress.org/
Description: This plugin very light's. He view main bad skill's about reading codex wp.
Version: 1.0
Author: JuniorDevelop
Author URI: http://natribu.org
*/

/*  Copyright 2017  JuniorDevelop  (email: junior@mail.ru)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class MyPlugin {

	public function hello(){
		add_shortcode('hi','hi_word');
        function hi_word() {
            echo "<h3 style='background: lightblue; color: black;'>>It's hell word's!!!<</h3>";
        }
	}
	public function install(){
        add_action( 'wp_install', 'my_option_install' );
        function my_option_install(){
            //
        }
    }
    public function uninstall() {
        register_uninstall_hook(__FILE__,'my_option_d');
            function my_option_d (){
                delete_option('/');
            }
    }
    public function addMenu() {
	    add_action('admin_menu','addMenuPage');
	    //addMenuPage дописать вывод, возможности и ее функции,иконку icon_url  и позицию в мен
	    function addMenuPage(){
	        add_menu_page('MyPlugin',
                'мой плагин',
                '',
                '',
                'menu_page_callback',
                '♞',
                2
            );
        }
        function menu_page_callback() {
	        echo '<h1> Страница моего плагина!</h1>';
        }
    }
    public function addSubMenu() {

        add_action('admin_menu', 'register_submenu_page');

        function register_submenu_page() {
            add_submenu_page( 'parent-slug',
                'page title',
                'menu title',
                'manage_options',
                'custom-submenu-page',
                'submenu_page_callback'
            );
        }

        function submenu_page_callback() {
            // контент страницы
            echo '<h2>Страница подменю</h2>';
        }
    }
}

//      $hiWord = new MyPlugin(); $hiWord -> hello();
//      $pageMenu = new MyPlugin();
//      $pageMenu ->addMenu();
// hooks menu => add_menu_page(); -> меню и саб-меню можно дергать через admin_menu
// в саб-меню нужно указывать родителя
// можно попробывать сразу закинуть в свойста $slug, $page_title, $menu_title,$capability,$function
// need link font awesome!