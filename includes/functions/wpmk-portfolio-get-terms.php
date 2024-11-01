<?php
/**
 * 
 * Function that show all terms
 * in loop
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function wpmk_portfolio_get_terms_class( $post_id = null ){
    
    if ($post_id === null)
        return;
    
    $wpmk_portfolio_terms = wp_get_post_terms($post_id, 'wpmk-portfolio-category');
    
    foreach ($wpmk_portfolio_terms as $wpmk_portfolio_term ){
        echo " " . $wpmk_portfolio_term->slug;
    }
}
?>