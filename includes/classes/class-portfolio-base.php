<?php

/**
 * @package WPMK PORTFOLIO
 * 
 * Here we define plugin action hook
 * it will add link in plugin action bar
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if(!class_exists('WPMK_PORTFOLIO_BASE')){
    
    class WPMK_PORTFOLIO_BASE{
        
        public function __construct() {
            $this->wpmk_portfolio_init();
        }
        
        /**
         * 
         *  Here is portfolio init
         * 
         */
        public function wpmk_portfolio_init(){
            add_action( 'init', array( $this, 'wpmk_portfolio_load_textdomain' ) );
            $this->wpmk_portfolio_include_classes();
        }
        
        /**
         * 
         * Here we are installing plugin options
         * and also plugin require data
         * 
         */
        static function wpmk_portfolio_install(){
            $wpmk_portfolio_template_name = array(
                '3_col_grid_view'    => '3 Column Grid View',
                '4_col_grid_view'    => '4 Column Grid View',
            );
            add_option('wpmk_portfolio_templates', $wpmk_portfolio_template_name);
            
            // Template Settings
            add_option('wpmk_portfolio_current_templates', '3_col_grid_view');
            add_option('wpmk_portfolio_enable_filter', true );
            add_option('wpmk_portfolio_filter_sort', 'ASC' );
            add_option('wpmk_portfolio_template_css', true );
            
            // Template Amination Setting
            include_once( WPMK_PORTFOLIO_INCLUDES . 'functions/wpmk-portfolio-animate-css.php' );
            add_option('wpmk_portfolio_animate_status', true );
            add_option('wpmk_portfolio_current_animate');
            add_option('wpmk_portfolio_current_animate_delay');
            add_option('wpmk_portfolio_current_animate_speed');
        }
        
        /**
         * 
         * Here we are uninstalling plugin options
         * and also plugin setup data
         * 
         */
        static function wpmk_portfolio_uninstall(){
            delete_option('wpmk_portfolio_templates');
            // Template Settings
            delete_option('wpmk_portfolio_current_templates');
            delete_option('wpmk_portfolio_enable_filter');
            delete_option('wpmk_portfolio_filter_sort');
            delete_option('wpmk_portfolio_template_css');
            
            // Template Animation Settings Set
            delete_option('wpmk_portfolio_animate');
            delete_option('wpmk_portfolio_animate_delay');
            delete_option('wpmk_portfolio_animate_speed');
            // Template Animation Settings
            delete_option('wpmk_portfolio_animate_status');
            delete_option('wpmk_portfolio_current_animate');
            delete_option('wpmk_portfolio_current_animate_delay');
            delete_option('wpmk_portfolio_current_animate_speed');
        }
        
        /**
         * 
         * Here We are setting portfolio text domain
         * 
         */
        public function wpmk_portfolio_load_textdomain() {
            load_plugin_textdomain( 'wpmk', false, WPMK_PORTFOLIO_DIR . 'languages' ); 
        }
        
        /**
         * 
         * Here We are setting portfolio classes
         * 
         */
        public function wpmk_portfolio_include_classes(){
            include_once( WPMK_PORTFOLIO_CLASSES . 'class-portfolio-styles-scripts.php' );
            include_once( WPMK_PORTFOLIO_CLASSES . 'class-portfolio-post-type.php' );
            include_once( WPMK_PORTFOLIO_CLASSES . 'class-portfolio-template-config.php' );
        }
    }
}
?>