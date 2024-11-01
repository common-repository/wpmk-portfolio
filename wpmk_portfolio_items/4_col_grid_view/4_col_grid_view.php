<?php
/**
 * WPMK Portfolio 4 Column Grid View Template
 * if you will modify this template than it
 * will be over write in plugin update so it
 * is batter for you that you should use this
 * template in your theme, for use in theme you
 * should copy wpmk_portfolio_items folder in your
 * theme right on root of your theme folder like
 * twentytwelve/wpmk_portfolio_items than customize
 * portfolio template as your need there is some default
 * function that you need to use in template if you create 
 * by your won, The function is blow
 * 
 * it will show you all category list as class
 * @function wpmk_portfolio_get_terms_class(get_the_ID());
 * 
 * it will show you animate.css css classes
 * @function wpmk_portfolio_animate_class();
 * 
 * it will show you featured image
 * @function wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(303, 203), false, '');
 * 
 * For add your own css class in filter container you can use this filter
 * @filter container apply_filters( 'wpmk_portfolio_filters_container_class' );
 * 
 * For add your own css class in item container you can use this filter
 * @filter container apply_filters( 'wpmk_portfolio_item_container_class' );
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit;

global $post;
$wpmk_3_col_grid_view_arg = array(
    'post_type'         => 'wpmk-portfolio',
    'order'             => "ASC",
    'posts_per_page'    => '-1'
);
$wpmk_portfolio_count = 1;
$wpmk_portfolio_post = new WP_Query( $wpmk_3_col_grid_view_arg );
while ( $wpmk_portfolio_post->have_posts() ) : $wpmk_portfolio_post->the_post();
$wpmk_portfolio_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(303, 203), false, '');
$wpmk_portfolio_projet_url = get_post_meta( get_the_ID() , 'wpmk_portfolio_project' , true);
?>
<!-- 4 Column Grid View Start -->
<div class="wpmk-portfolio-4-col <?php wpmk_portfolio_animate_class(); ?><?php wpmk_portfolio_get_terms_class(get_the_ID()); ?>">
    
    <!-- 4 Column Grid View Title Start -->
    <h6 class="wpmk-title"><?php the_title(); ?></h6>
    <!-- 4 Column Grid View Title End -->
    
    <!-- 4 Column Grid View Featured Image Start -->
    <div class="wpmk-portfolio-image">
        <!-- 4 Column Grid View Excerpt Start -->
        <?php
            $wpmk_portfolio_get_excerpt = get_the_excerpt();
            $wpmk_portfolio_excerpt = substr( $wpmk_portfolio_get_excerpt , 0, 150); 
        ?>
        <span class="wpmk-portfolio-excerpt"><p><?php if(has_excerpt($post->ID)){ echo $wpmk_portfolio_excerpt; } ?></p></span>
        <!-- 4 Column Grid View Excerpt End -->
        <img src="<?php echo $wpmk_portfolio_post_image[0]; ?>" alt="<?php the_title(); ?>" />
    </div>
    <!-- 4 Column Grid View Featured Image End -->
    
    <!-- 4 Column Grid View Read More Start -->
    <div class="wpmk-read-more">
        <a href="<?php the_permalink(); ?>"><?php _e('Read More &rarr;', 'wpmk'); ?></a>
    </div>
    <!-- 4 Column Grid View Read More End -->
    
    <?php if(!empty($wpmk_portfolio_projet_url)) : ?>
    <!-- 4 Column Grid View View Project Start -->
    <div class="wpmk-view-project">
        <a href="<?php echo esc_url( $wpmk_portfolio_projet_url ); ?>" target="_blank"><?php _e('View Project &rarr;', 'wpmk'); ?></a>
    </div>
    <!-- 4 Column Grid View View Project End -->
    <?php endif; ?>
    
</div>
<!-- 4 Column Grid View End -->
<?php
if ($wpmk_portfolio_count % 4 == 0) {
    echo '<div class="wpmk-portfolio-clear"></div>';
}
$wpmk_portfolio_count++;
endwhile;
wp_reset_query();
?>