<?php
if (!class_exists('DASH_NOT_FOUND_PAGE_CONSTRUCT')) {

    /**
     * A PostTypeTemplate class
     */
    class DASH_NOT_FOUND_PAGE_CONSTRUCT
    {

        /**
         * The Constructor
         */
        public function __construct()
        {

            // register actions

            add_action('init', array(&$this, 'init'));
            
        }
        // END public function __construct()

        /**
         * hook into WP's init action hook
         */
        public function init()
        {

            add_action("template_redirect", array(&$this, 'not_found_event'));

        }
        // END public function init()

       
        public function not_found_event()
        {
            global $wp_query;

            if (@$wp_query->is_404) {
                $return_template = sprintf("%1s/../tpl/base.php", dirname(__FILE__));
                include $return_template;
                die();
            } 
        }

    }
    // END class DASH_NOT_FOUND_PAGE_CONSTRUCT
}
// END if(!class_exists('DASH_NOT_FOUND_PAGE_CONSTRUCT'))
