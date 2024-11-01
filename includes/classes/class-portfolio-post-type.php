<?php

/**
 * @package WPMK PORTFOLIO
 * 
 * Here we define plugin Post Type
 * it will add portfolio Post Type
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit;
 
if(!class_exists('WPMK_PORTFOLIO_POST_TYPE')){
    
    class WPMK_PORTFOLIO_POST_TYPE{
        
        public function __construct() {
            $this->wpmk_portfolio_post_type_init();
        }
        
        /**
         * 
         *  Here is portfolio post type init
         * 
         */
        public function wpmk_portfolio_post_type_init(){
            add_action( 'init', array( $this, 'wpmk_portfolio_post_type' ) );
            add_action( 'init', array( $this, 'wpmk_portfolio_post_taxonomy' ), 0  );
            add_action( 'init', array( $this, 'wpmk_portfolio_post_tag' ), 0  );
            add_action( 'add_meta_boxes', array( $this, 'wpmk_portfolio_add_meta_box' ) );
            add_action( 'save_post', array( $this, 'wpmk_portfolio_save_project_url' ), 10, 2 );
            add_action( 'admin_menu', array( $this, 'wpmk_portfolio_register_setting_page' ) );
        }
        
        /**
         * 
         * Here We are setting portfolio post type
         * 
         */
        function wpmk_portfolio_post_type(){
            
            $labels = array(
                'name' => __('WPMK Portfolio ( All Portfolios List )', 'wpmk'),
                'singular_name' => __('All Portfolios', 'wpmk'),
                'add_new' => __('Add New Portfolio', 'wpmk'),
                'add_new_item' => __('WPMK Portfolio - Add New Portfolio', 'wpmk'),
                'edit_item' => __('Edit Portfolio', 'wpmk'),
                'new_item' => __('New Portfolio', 'wpmk'),
                'view_item' => __('View Portfolio', 'wpmk'),
                'search_items' => __('Search Portfolio', 'wpmk'),
                'not_found' => __('No portfolio found', 'wpmk'),
                'not_found_in_trash' => __('No portfolios found in trash', 'wpmk'),
                'parent_item_colon' => '',
                'menu_name' => __('WPMK Portfolio', 'wpmk')
            );
            $args = array(
                'labels'             => $labels,
        		'public'             => true,
        		'publicly_queryable' => true,
        		'show_ui'            => true,
        		'show_in_menu'       => true,
        		'query_var'          => true,
        		'rewrite'            => array( 'slug' => 'wpmk-portfolio' ),
        		'capability_type'    => 'post',
        		'has_archive'        => true,
        		'hierarchical'       => true,
        		'menu_position'      => null,
                'menu_icon'          => 'dashicons-id-alt',
        		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
            );
            
            register_post_type( 'wpmk-portfolio' , $args);
        }
        
        /**
         * 
         * Here We are setting portfolio taxonomy
         * 
         */
        public function wpmk_portfolio_post_taxonomy(){
        
        	$labels = array(
        		'name'              => _x( 'Categorys', 'wpmk' ),
        		'singular_name'     => _x( 'Category', 'wpmk' ),
        		'search_items'      => __( 'Search Categorys', 'wpmk' ),
        		'all_items'         => __( 'All Categorys', 'wpmk' ),
        		'parent_item'       => __( 'Parent Category', 'wpmk' ),
        		'parent_item_colon' => __( 'Parent Category:', 'wpmk' ),
        		'edit_item'         => __( 'Edit Category', 'wpmk' ),
        		'update_item'       => __( 'Update Category', 'wpmk' ),
        		'add_new_item'      => __( 'Add New Category', 'wpmk' ),
        		'new_item_name'     => __( 'New Category Name', 'wpmk' ),
        		'menu_name'         => __( 'Category', 'wpmk' ),
        	);
        
        	$args = array(
        		'hierarchical'      => true,
        		'labels'            => $labels,
        		'show_ui'           => true,
        		'show_admin_column' => true,
        		'query_var'         => true,
        		'rewrite'           => array( 'slug' => 'wpmk-portfolio-category' ),
        	);
        
        	register_taxonomy( 'wpmk-portfolio-category', array( 'wpmk-portfolio' ), $args );
        }
        
        /**
         * 
         * Here We are setting portfolio tags
         * 
         */
        public function wpmk_portfolio_post_tag(){
            $labels = array(
        		'name'                       => _x( 'Tags', 'wpmk' ),
        		'singular_name'              => _x( 'Tag', 'wpmk' ),
        		'search_items'               => __( 'Search Tags', 'wpmk' ),
        		'popular_items'              => __( 'Popular Tags', 'wpmk' ),
        		'all_items'                  => __( 'All Tags', 'wpmk' ),
        		'parent_item'                => null,
        		'parent_item_colon'          => null,
        		'edit_item'                  => __( 'Edit Tag', 'wpmk' ),
        		'update_item'                => __( 'Update Tag', 'wpmk' ),
        		'add_new_item'               => __( 'Add New Tag', 'wpmk' ),
        		'new_item_name'              => __( 'New Tag Name', 'wpmk' ),
        		'separate_items_with_commas' => __( 'Separate tags with commas', 'wpmk' ),
        		'add_or_remove_items'        => __( 'Add or remove tags', 'wpmk' ),
        		'choose_from_most_used'      => __( 'Choose from the most used tags', 'wpmk' ),
        		'not_found'                  => __( 'No tags found.', 'wpmk' ),
        		'menu_name'                  => __( 'Tags', 'wpmk' ),
        	);
        
        	$args = array(
        		'hierarchical'          => false,
        		'labels'                => $labels,
        		'show_ui'               => true,
        		'show_admin_column'     => true,
        		'update_count_callback' => '_update_post_term_count',
        		'query_var'             => true,
        		'rewrite'               => array( 'slug' => 'wpmk-portfolio-tag' ),
        	);
        
        	register_taxonomy( 'wpmk-portfolio-tag', 'wpmk-portfolio', $args );
        }
        
        /**
         * 
         * Here We are add meta box in portfolio
         * post type for project url
         * 
         */
        public function wpmk_portfolio_add_meta_box(){
            add_meta_box(
                'wpmk_portfolio_project_url',
                esc_html__( 'Please Enter Your Project Url Here', 'wpmk' ),
                array( $this, 'wpmk_portfolio_project_url' ),
                'wpmk-portfolio',
                'normal',
                'default'
            );
        }
        
        /**
         * 
         * Here We are meta box callback
         * function for portfolio
         * 
         */
        public function wpmk_portfolio_project_url(){
            
            global $post;
        	
            wp_nonce_field( 'wpmk_portfolio_project_url', 'wpmk_portfolio_project_nonce' );
       	    
            $wpmk_portfolio_project = get_post_meta( $post->ID, 'wpmk_portfolio_project', true );
            
            echo '<input type="text" name="wpmk_portfolio_project" value="' .  esc_url( $wpmk_portfolio_project )  . '" class="widefat">';
        }
        
        /**
         * 
         * Here We are saving meta box project
         * url for portfolio
         * 
         */
        public function wpmk_portfolio_save_project_url( $post_id, $post ) {
            
            if ( ! isset( $_POST['wpmk_portfolio_project_nonce'] ) ) {
              return;
            }
            
            $wpmk_portfolio_project_nonce = $_POST['wpmk_portfolio_project_nonce'];
            
            if ( ! wp_verify_nonce( $wpmk_portfolio_project_nonce, 'wpmk_portfolio_project_url' ) ) {
                return;
            }
            
            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return;
            }
            
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
            
            if ( 'revision' === $post->post_type ) {
                return;
            }
            
            if(empty($_POST['wpmk_portfolio_project']))
                return;
            
            if ( ! isset( $_POST['wpmk_portfolio_project'] ) ) {
              return;
            }
            
            $wpmk_portfolio_project_url = array();
            $wpmk_portfolio_project_key = sanitize_key( 'wpmk_portfolio_project' );
            $wpmk_portfolio_project_val = esc_url_raw( $_POST['wpmk_portfolio_project'] );
        	
            $wpmk_portfolio_project_url[$wpmk_portfolio_project_key] = $wpmk_portfolio_project_val;

            foreach ( $wpmk_portfolio_project_url as $key => $value ) :
        		
        
        		if ( get_post_meta( $post_id, $key, false ) ) {
        			update_post_meta( $post_id, $key, $value );
        		} else {
        			add_post_meta( $post_id, $key, $value);
        		}
        
        		if ( ! $value ) {
        			delete_post_meta( $post_id, $key );
        		}
                
        	endforeach;
        }

        /**
         * 
         * Here We are register portfolio setting page
         * 
         */
        public function wpmk_portfolio_register_setting_page(){
            add_submenu_page( 'edit.php?post_type=wpmk-portfolio', __( 'Portfolio Settings', 'wpmk' ), __( 'Portfolio Settings', 'wpmk' ), 'manage_options', 'wpmk-portfolio', array( $this, 'wpmk_portfolio_setting_page' ) );
        }
        
        /**
         * 
         * Here We are setting portfolio setting page
         * where user handel there portfolio view
         * 
         */
        public function wpmk_portfolio_setting_page(){
            include_once( WPMK_PORTFOLIO_INCLUDES . 'settings/wpmk-portfolio-save-setting-page.php' );
            include_once( WPMK_PORTFOLIO_INCLUDES . 'settings/wpmk-portfolio-setting-page.php' );
        }
    }
    new WPMK_PORTFOLIO_POST_TYPE();
}
?>