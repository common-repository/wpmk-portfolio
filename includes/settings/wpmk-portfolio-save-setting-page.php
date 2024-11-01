<?php
/**
 * 
 * Here we are save plugin settings
 * and it will handel whole plugin
 * either template in theme or not
 * 
 */
if ( ! defined( 'ABSPATH' ) ) exit;


if(isset($_POST['wpmk_portfolio_submit'])){
    
    $wpmk_portfolio_settings_nonce = $_REQUEST['_wpnonce'];
    
    if ( ! wp_verify_nonce( $wpmk_portfolio_settings_nonce, 'wpmk_portfolio_settings_nonce' ) )
        return;  
        
    $wpmk_portfolio_templates           = sanitize_key(  $_POST['wpmk_portfolio_templates'] );
    $wpmk_portfolio_filter_enable       = sanitize_key( isset( $_POST['wpmk_portfolio_filter_enable'] ) );
    $wpmk_portfolio_filter_sort         = sanitize_text_field(  $_POST['wpmk_portfolio_filter_sort'] );
    $wpmk_portfolio_default_css         = sanitize_key( isset( $_POST['wpmk_portfolio_default_css'] ) );
    $wpmk_portfolio_enable_animate_css  = sanitize_key( isset( $_POST['wpmk_portfolio_enable_animate_css'] ) );
    $wpmk_portfolio_animation_type      = sanitize_text_field( $_POST['wpmk_portfolio_animation_type'] );
    $wpmk_portfolio_animation_delay     = sanitize_key( $_POST['wpmk_portfolio_animation_delay'] );
    $wpmk_portfolio_animation_speed     = sanitize_key( $_POST['wpmk_portfolio_animation_speed'] );
    
    update_option( 'wpmk_portfolio_current_templates', $wpmk_portfolio_templates );
    update_option( 'wpmk_portfolio_enable_filter', $wpmk_portfolio_filter_enable );
    update_option( 'wpmk_portfolio_filter_sort', $wpmk_portfolio_filter_sort );
    update_option( 'wpmk_portfolio_template_css', $wpmk_portfolio_default_css );
    update_option( 'wpmk_portfolio_animate_status', $wpmk_portfolio_enable_animate_css );
    update_option( 'wpmk_portfolio_current_animate', $wpmk_portfolio_animation_type );
    update_option( 'wpmk_portfolio_current_animate_delay', $wpmk_portfolio_animation_delay );
    update_option( 'wpmk_portfolio_current_animate_speed', $wpmk_portfolio_animation_speed );
}
?>