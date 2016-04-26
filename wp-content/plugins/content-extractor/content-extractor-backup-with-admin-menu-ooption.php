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

// action function for above hook
function content_extractor_menu() {
    // Add a new submenu under Settings:
    //add_options_page(__('Test Settings','menu-content-extractor'), __('Test Settings','menu-content-extractor'), 'manage_options', 'testsettings', 'mt_settings_page');
    // Add a new submenu under Tools:
    //add_management_page( __('Test Tools','menu-content-extractor'), __('Test Tools','menu-content-extractor'), 'manage_options', 'testtools', 'mt_tools_page');

    // Add a new top-level menu (ill-advised):
    add_menu_page(__('Dashboard','menu-content-extractor'), __('Content Extractor','menu-content-extractor'), 'manage_options', 'mt-top-level-handle', 'content_main_menu' );
    // Add a submenu to the custom top-level menu:
    add_submenu_page('mt-top-level-handle', __('Content Export','menu-content-extractor'), __('Content Export','menu-content-extractor'), 'manage_options', 'content-extract', 'content_extract');
    // Add a second submenu to the custom top-level menu:
    add_submenu_page('mt-top-level-handle', __('Content Modification','menu-content-extractor'), __('Content Modification','menu-content-extractor'), 'manage_options', 'content-modify', 'content_extract');
}

/* mt_settings_page() displays the page content for the Test Settings submenu
function mt_settings_page() {
    echo "<h2>" . __( 'Test Settings', 'menu-content-extractor' ) . "</h2>";
}

// mt_tools_page() displays the page content for the Test Tools submenu
function mt_tools_page() {
    echo "<h2>" . __( 'Test Tools', 'menu-content-extractor' ) . "</h2>";
}
*/
// mt_toplevel_page() displays the page content for the custom Content Extractor menu
function content_main_menu() {
    echo "<h2>" . __( 'Dashboard', 'menu-content-extractor' ) . "</h2>";
}

// mt_sublevel_page() displays the page content for the first submenu
// of the custom Content Extractor menu
function content_extract() {
    echo "<h2>" . __( 'Content Export', 'menu-content-extractor' ) . "</h2>";
}

// mt_sublevel_page2() displays the page content for the second submenu
// of the custom Content Extractor menu
function content_modify() {
    echo "<h2>" . __('Content Modification', 'menu-content-extractor') . "</h2>";
}