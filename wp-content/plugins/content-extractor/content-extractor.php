<?php
/*
Plugin Name: WordPress Content Extractor In Word File
Plugin URI: http://www.lprakash.com.np/
Description: WordPress Content Extractor In Word File plugin is for those who is suffering from getting contents in word file.
Version: 1.0
Author: Prakash Kumar Luitel
Author URI: http://www.lprakash.com.np/
License: GPL
*/

// Hook for adding admin menus
add_action('admin_menu', 'content_extractor_menu');

// action function for above hook. This adds top level menu and two sub-menus.
function content_extractor_menu() {
    add_menu_page(__('Content Extractor','menu-content-extractor'), __('Content Extractor','menu-content-extractor'), 'manage_options', 'mt-top-level-handle', 'content_main_menu' );
    add_submenu_page('mt-top-level-handle', __('Content Export','menu-content-extractor'), __('Content Export','menu-content-extractor'), 'manage_options', 'content-extract', 'content_extract');
    add_submenu_page('mt-top-level-handle', __('Content Modification','menu-content-extractor'), __('Content Modification','menu-content-extractor'), 'manage_options', 'content-modify', 'content_modify');
}

// Top Level Menu Page
function content_main_menu() {
    echo "<h2>" . __( 'Dashboard', 'menu-content-extractor' ) . "</h2>";
}

// Content Export Page
function content_extract() {
    include 'menu-content-extractor.php';
}

// Content Modify Page
function content_modify() {
    echo "<h2>" . __('Content Modification', 'menu-content-extractor') . "</h2>";
}