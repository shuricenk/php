<?php
/*
Plugin Name: MyPlugin
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

//$page_home = require_once __DIR__.'/page/home.php';
//$page_option = require_once (__DIR__.'/page/option.php');
//$page_info = require_once __DIR__.'/page/information.php';

class MyPlugin {

    public function __construct(){
        add_action( 'wp_enqueue_scripts',array($this,'scripts_styles')); // скрипты и стили запускаем через конструктор
    }

    public function init(){
        add_shortcode('hi', array($this,'hi_word'));// шорткод на вывод строки по вызову [hi/]
        add_action( 'wp_install', array($this,'install'));//хук на установку своего option in db
        register_uninstall_hook(__FILE__,array($this,'uninstall'));//регистрируем хук на делит своей опции из бд
        add_action('admin_menu',array($this,'AddMenuPage')); //в админ-меню включаем вкладку плагина

    }

    public function hi_word() {
        echo "<h3 style='background: lightblue; color: black;'>>It's hell word's!!!<</h3>"; //безталковая функия х_х
        }
	public function install(){
        add_option('my_test_option','255','','no'); //добавление опции в базу -> name,value,'none',автоподгрузка из базы
    }
    public function uninstall() {
        delete_option('my_test_option'); //функция удаления опции из базы
    }
    public function addMenuPage() {


      add_menu_page('MyPlugin',       // вкладка меню с 3мя саб-менюшками каждая из которых выводит
               'Мой Плагин',          // на отдельный php файл
               'manage_options',
               '_my_plugin',
               '',
               plugin_dir_url( __FILE__ ) .'/img/icon.png', //'dashicons-welcome-view-site' <- default wp icons
               4
               );

        add_submenu_page( '_my_plugin',
            'page home',
            '🏠 Главная',
            'manage_options',
            'page_home',
            'page_include'
            );
        add_submenu_page( '_my_plugin',
            'page option',
            '🔧 Настройки',
            'manage_options',
            'page_option',
            'page_include'
            );

        add_submenu_page( '_my_plugin',
            'page info',
            '★ Информация',
            'manage_options',
            'page_info',
            'page_include'
            );

        function page_include(){
//            $page = $_REQUEST['page']; var_dump($page); //проверочки
            switch($_GET) {
                case in_array('page_home',$_REQUEST):
                    require_once __DIR__.'/page/home.php';
                    break;
                case in_array('page_option',$_REQUEST):
                    require_once __DIR__.'/page/option.php';
                    break;
                case in_array('page_info',$_REQUEST):
                    require_once __DIR__.'/page/information.php';
                    break;
            }
        }

        remove_submenu_page('_my_plugin','_my_plugin');
    }
    public function scripts_styles(){
        wp_enqueue_script('jquery');
        wp_enqueue_style('awesome');
        wp_enqueue_script( 'uilang', __DIR__. '/js/uilang.js','','',true);
        wp_register_style( 'awesome', plugins_url('/css/font-awesome.min.css'));
    }
}

$use = new MyPlugin();
$use->init();


// register_deactivation_hook()? register_activation_hook()?