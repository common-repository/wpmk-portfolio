<?php
/**
 * 
 * Function that show animate.css
 * class in loop
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function wpmk_portfolio_animate_class(){
    
    $wpmk_portfolio_get_status= get_option( 'wpmk_portfolio_animate_status' );
    $wpmk_portfolio_get_class = get_option( 'wpmk_portfolio_current_animate' );
    $wpmk_portfolio_get_delay = get_option( 'wpmk_portfolio_current_animate_delay' );
    $wpmk_portfolio_get_speed = get_option( 'wpmk_portfolio_current_animate_speed' );
    
    if( $wpmk_portfolio_get_status == true ){
        $wpmk_portfolio_enable = 'animated ';
    
        echo $wpmk_portfolio_enable . $wpmk_portfolio_get_class . ' ' . $wpmk_portfolio_get_delay . ' ' . $wpmk_portfolio_get_speed;
    }   
}
?>