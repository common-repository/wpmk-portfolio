<?php

/**
 * @package WPMK PORTFOLIO
 * 
 * Here we define plugin stylesheet and scripts
 * that we use for run portfolio
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if(!class_exists('WPMK_PORTFOLIO_STYLES_SCRIPTS')){
  
    class WPMK_PORTFOLIO_STYLES_SCRIPTS{
        
        public function __construct() {
            $this->wpmk_portfolio_styles_scripts_init();
        }
        
        /**
         * 
         *  Here is portfolio style and script init
         * 
         */
        public function wpmk_portfolio_styles_scripts_init(){
            $wpmk_template_name = get_option('wpmk_portfolio_current_templates');
            $wpmk_portfolio_template_css = get_option( 'wpmk_portfolio_template_css' );
            
            if( $wpmk_portfolio_template_css == true ) :
                if( $wpmk_template_name == '3_col_grid_view' ){
                    add_action( 'init', array( $this, 'wpmk_portfolio_3_col_grid_view'), 1001 );
                }
                
                if( $wpmk_template_name == '4_col_grid_view' ){
                    add_action( 'init', array( $this, 'wpmk_portfolio_4_col_grid_view'), 1001 );
                }
            endif;
            
            add_action( 'init', array( $this, 'wpmk_portfolio_stylesheets'), 1001 );
            add_action( 'init', array( $this, 'wpmk_portfolio_scripts'), 1001 );
            add_action( 'admin_enqueue_scripts', array( $this, 'wpmk_portfolio_admin_scripts'), 1001 );
        }
        
        /**
         * 
         *  Here is portfolio enqueue style
         * 
         */
        public function wpmk_portfolio_stylesheets(){
            wp_register_style( 'wpmk-default', WPMK_PORTFOLIO_ASSETS . 'css/wpmk-default.css', null, null, 'screen' );
            wp_register_style( 'wpmk-animate', WPMK_PORTFOLIO_ASSETS . 'css/animate.min.css', null, null, 'screen' );
            wp_enqueue_style( 'wpmk-default' );
            wp_enqueue_style( 'wpmk-animate' );
        }
        
        /**
         * 
         *  Here is portfolio enqueue script
         * 
         */
        public function wpmk_portfolio_scripts(){
            wp_register_script( 'wpmk-script', WPMK_PORTFOLIO_ASSETS . 'js/wpmk-script.js', array(), WPMK_PORTFOLIO_VERSION, false );
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'wpmk-script' );
        }
        
        /**
         * 
         *  Here is portfolio enqueue script
         * 
         */
        public function wpmk_portfolio_admin_scripts(){
            wp_register_style( 'wpmk-portfolio', WPMK_PORTFOLIO_ASSETS . 'css/wpmk-admin.css', null, null, 'screen' );
            wp_enqueue_style( 'wpmk-portfolio' );
        }
        
        /**
         * 
         *  Here is portfolio enqueue script
         * 
         */
         public function wpmk_portfolio_3_col_grid_view(){
            wp_register_style( 'wpmk-3_col_grid_view', WPMK_PORTFOLIO_ASSETS . 'css/3_col_grid_view.css', null, null, 'screen' );
            wp_enqueue_style( 'wpmk-3_col_grid_view' );
         }
         
         /**
         * 
         *  Here is portfolio enqueue script
         * 
         */
         public function wpmk_portfolio_4_col_grid_view(){
            wp_register_style( 'wpmk-4_col_grid_view', WPMK_PORTFOLIO_ASSETS . 'css/4_col_grid_view.css', null, null, 'screen' );
            wp_enqueue_style( 'wpmk-4_col_grid_view' );
         }
    }
    new WPMK_PORTFOLIO_STYLES_SCRIPTS();
}
?>