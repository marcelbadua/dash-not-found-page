<?php
if(!class_exists('DASH_NOT_FOUND_PAGE_SETTINGS'))
{
	class DASH_NOT_FOUND_PAGE_SETTINGS
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// register actions
            add_action('admin_init', array(&$this, 'admin_init'));
        	add_action('admin_menu', array(&$this, 'add_menu'));
		} // END public function __construct
		
        /**
         * hook into WP's admin_init action hook
         */
        public function admin_init()
        {
        	// register your plugin's settings
        	register_setting('dash_not_found_page-group', 'not_found_page');
        	// add your settings section
        	add_settings_section(
        	    'dash_not_found_page-section', 
        	    'Dash Not Found Page Settings', 
        	    array(&$this, 'settings_section_dash_not_found_page'), 
        	    'dash_not_found_page'
        	);
        	
        	// add your setting's fields
            add_settings_field(
                'dash_not_found_page-not_found_page', 
                'Page for 404', 
                array(&$this, 'settings_field_input_text'), 
                'dash_not_found_page', 
                'dash_not_found_page-section',
                array(
                    'field' => 'not_found_page'
                )
            );

            // Possibly do additional admin_init tasks
        } // END public static function activate
        
        public function settings_section_dash_not_found_page()
        {
            // Think of this as help text for the section.
            echo 'These settings do things for the Dash Not Found Page.';
        }
        
        /**
         * This function provides text inputs for settings fields
         */
        public function settings_field_input_text($args)
        {
            $pages = get_pages(); 
            
            // Get the field name from the $args array
            $field = $args['field'];
            // Get the value of this setting
            $value = get_option($field);
            // echo a proper input type="text"
            echo sprintf('<select name="%s" id="%s" />', $field, $field);
            
            foreach ( $pages as $page ) {
          	    echo  '<option value="' . $page->ID  . '"' . selected($page->ID, $value ) . '>' . $page->post_title . '</option>';
            }
            
            echo '</select>';
              
        } // END public function settings_field_input_text($args)
        
        /**
         * add a menu
         */		
        public function add_menu()
        {
            // Add a page to manage this plugin's settings
        	add_options_page(
        	    'Dash Not Found Page Settings', 
        	    'Dash Not Found Page', 
        	    'manage_options', 
        	    'dash_not_found_page', 
        	    array(&$this, 'plugin_settings_page')
        	);
        } // END public function add_menu()
    
        /**
         * Menu Callback
         */		
        public function plugin_settings_page()
        {
        	if(!current_user_can('manage_options'))
        	{
        		wp_die(__('You do not have sufficient permissions to access this page.'));
        	}
	
        	// Render the settings template
        	include(sprintf("%s/../tpl/settings.php", dirname(__FILE__)));
        } // END public function plugin_settings_page()
    } // END class DASH_NOT_FOUND_PAGE_SETTINGS
} // END if(!class_exists('DASH_NOT_FOUND_PAGE_SETTINGS'))