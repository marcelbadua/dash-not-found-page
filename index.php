<?php

/*
Plugin Name: Dash Not Found Page
Plugin URI: 
Description: Assign a page to be sites 404 page.
Version: 1.1.0
Author: Marcel Badua
Author URI: http://marcelbadua.com/
License: GPL2
*/

/*
Copyright 2017  Marcel Badua  (email : bitterdash@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!class_exists('DASH_NOT_FOUND_PAGE')) {
    class DASH_NOT_FOUND_PAGE
    {
        /**
         * Construct the plugin object
         */
        public function __construct() {

            // Initialize Settings
            require_once(sprintf("%s/inc/settings.php", dirname(__FILE__)));
            $DASH_NOT_FOUND_PAGE_SETTINGS = new DASH_NOT_FOUND_PAGE_SETTINGS();

            require_once( sprintf("%s/inc/construct.php", dirname(__FILE__)) );
            $DASH_NOT_FOUND_PAGE_CONSTRUCT = new DASH_NOT_FOUND_PAGE_CONSTRUCT();


        } // END public function __construct

        /**
         * Activate the plugin
         */
        public static function activate() {
            // Do nothing
        } // END public static function activate
        
        /**
         * Deactivate the plugin
         */
        public static function deactivate() {
            // Do nothing
        }// END public static function deactivate

    } // END class DASH_NOT_FOUND_PAGE
} // END if(!class_exists('DASH_NOT_FOUND_PAGE'))

if (class_exists('DASH_NOT_FOUND_PAGE')) {
    // Installation and uninstallation hooks
    register_activation_hook(__FILE__, array('DASH_NOT_FOUND_PAGE','activate'));
    register_deactivation_hook(__FILE__, array( 'DASH_NOT_FOUND_PAGE', 'deactivate'));
    // instantiate the plugin class
    $dash_not_found_page = new DASH_NOT_FOUND_PAGE();
}
