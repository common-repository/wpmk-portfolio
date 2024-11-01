<?php

/**
 * @package WPMK PORTFOLIO
 * 
 * Here we define plugin configreation
 * this class hold templates and also 
 * shortcode, and will handel theme too.
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit;
 
if(!class_exists('WPMK_PORTFOLIO_CONFIG')){
    
    class WPMK_PORTFOLIO_CONFIG{
        
        public function __construct() {
            $this->wpmk_portfolio_config_init();
        }
        
        /**
         * 
         *  Here is portfolio style and script init
         * 
         */
        public function wpmk_portfolio_config_init(){
            add_shortcode( 'wpmk-portfolio', array( $this, 'wpmk_portfolio_shortcode' ) );
        }
        
        /**
         * 
         *  Here is portfolio filters
         * 
         */
        public function wpmk_portfolio_filters(){
            global $wpmk_css_class;
            $wpmk_portfolio_filter_sort = get_option( 'wpmk_portfolio_filter_sort' );
            if(!empty($wpmk_portfolio_filter_sort)){
                $wpmk_portfolio_sort = $wpmk_portfolio_filter_sort;
            }else{
                $wpmk_portfolio_sort = 'ASC';
            }
            $wpmk_portfolio_categories = get_categories( array(
                'orderby' => 'name',
                'order'   => "$wpmk_portfolio_sort",
                'taxonomy'=> 'wpmk-portfolio-category'
            ));
            echo '<div class="wpmk-portfolio-filters-container '. apply_filters( 'wpmk_portfolio_filters_container_class', $wpmk_css_class ) .'"><ul>';
            echo '<li class="wpmk-portfolio-all"><div class="wpmk-portfolio-filters wpmk-active-portfolio" id="wpmk-show-all-portfolio">All</div></li>';
                foreach( $wpmk_portfolio_categories as $wpmk_portfolio_cat ) :
                    echo '<li class="wpmk-portfolio-' . $wpmk_portfolio_cat->slug .'"><div class="wpmk-portfolio-filters wpmk-portfolio-filter-' . $wpmk_portfolio_cat->cat_ID .'" id="' . $wpmk_portfolio_cat->slug .'">' . $wpmk_portfolio_cat->name . '</div></li>';
                endforeach;
            echo '</ul></div>';
        }
        
        /**
         * 
         *  Here is portfolio container
         *  Start
         */
        public function wpmk_portfolio_container_start(){
            echo '<div class="wpmk-portfolio-container">';
        }
        
        /**
         * 
         *  Here is portfolio container
         *  End
         */
        public function wpmk_portfolio_container_end(){
            echo '</div>';
        }
        
        /**
         * 
         *  Here is portfolio filters
         * 
         */
        public function wpmk_portfolio_item_container(){
            global $wpmk_css_class;
            $wpmk_template_name = get_option('wpmk_portfolio_current_templates');
            $wpmk_template_dir_name = 'wpmk_portfolio_items';
            $wpmk_template_dir = WPMK_PORTFOLIO_CURRENT_THEME . $wpmk_template_dir_name . '/';
            if (!file_exists( $wpmk_template_dir )) {
                // Get Items From Plugin
                echo '<div class="wpmk-portfolio-items-container '. apply_filters( 'wpmk_portfolio_item_container_class', $wpmk_css_class ) .'" id="wpmk-portfolio-items-container">';
                include_once( WPMK_PORTFOLIO_TEMPLATES . $wpmk_template_name . '/' . "/$wpmk_template_name.php" );
                echo '</div>';
            }else{
                // Get Items From Theme
                echo '<div class="wpmk-portfolio-items-container '. apply_filters( 'wpmk_portfolio_item_container_class', $wpmk_css_class ) .'" id="wpmk-portfolio-items-container">';
                include_once( WPMK_PORTFOLIO_CURRENT_THEME . $wpmk_template_dir_name . '/' . $wpmk_template_name . '/' . "$wpmk_template_name.php" );
                echo '</div>';
            }
        }
        
        /**
         * 
         *  Here is portfolio shortcode
         * 
         */
        public function wpmk_portfolio_shortcode( $atts ){
            $wpmk_portfolio_enable_filter = get_option( 'wpmk_portfolio_enable_filter' );
            ob_start();
                $this->wpmk_portfolio_container_start();
                
                if($wpmk_portfolio_enable_filter == true ) :
                    $this->wpmk_portfolio_filters();
                endif;
                
                $this->wpmk_portfolio_item_container();
                $this->wpmk_portfolio_container_end();
            wp_reset_postdata();
            return ob_get_clean();
        }
        
    }
    new WPMK_PORTFOLIO_CONFIG();
}
?>