<?php

if ( ! defined( 'ABSPATH' ) ) exit;


// Getting Settings
$wpmk_portfolio_templates       =  get_option( 'wpmk_portfolio_templates' );
$wpmk_portfolio_animate         =  get_option( 'wpmk_portfolio_animate' );
$wpmk_portfolio_animate_delay   =  get_option( 'wpmk_portfolio_animate_delay' );
$wpmk_portfolio_animate_speed   =  get_option( 'wpmk_portfolio_animate_speed' );

// After Update Settings
$wpmk_portfolio_current_templates       = get_option( 'wpmk_portfolio_current_templates' );
$wpmk_portfolio_enable_filter           = get_option( 'wpmk_portfolio_enable_filter' );
$wpmk_portfolio_filter_sort             = get_option( 'wpmk_portfolio_filter_sort' );
$wpmk_portfolio_template_css            = get_option( 'wpmk_portfolio_template_css' );
$wpmk_portfolio_animate_status          = get_option( 'wpmk_portfolio_animate_status' );
$wpmk_portfolio_current_animate         = get_option( 'wpmk_portfolio_current_animate' );
$wpmk_portfolio_current_animate_delay   = get_option( 'wpmk_portfolio_current_animate_delay' );
$wpmk_portfolio_current_animate_speed   = get_option( 'wpmk_portfolio_current_animate_speed' );
?>
<h1><?php _e( 'WPMK Portfolio Setting Page', 'wpmk' ); ?></h1>
<form method="post" action="">
    <?php wp_nonce_field('wpmk_portfolio_settings_nonce'); ?>
    <table class="form-table">
        <tbody>
            
            <!-- Select Portfolio Shortcode Start -->
            <tr>
                <th scope="row">
                    <label for="wpmk_portfolio_shortcode"><?php _e( 'WPMK Portfolio Shortcode', 'wpmk' ); ?></label>
                </th>
                <td>
                    <code>[wpmk-portfolio]</code>
                </td>
            </tr>
            <!-- Select Portfolio Shortcode End -->
            
            <!-- Select Portfolio Template Start -->
            <tr>
                <th scope="row">
                    <label for="wpmk_portfolio_templates"><?php _e( 'Select Portfolio Template', 'wpmk' ); ?></label>
                </th>
                <td>
                    <select name="wpmk_portfolio_templates" id="wpmk_portfolio_templates">
                        <option value="">-- Select Template --</option>
                        <?php foreach( $wpmk_portfolio_templates as $wpmk_portfolio_template_slug => $wpmk_portfolio_template_name ) : ?>
                        <option value="<?php echo $wpmk_portfolio_template_slug; ?>" <?php if( $wpmk_portfolio_current_templates == $wpmk_portfolio_template_slug ){ echo 'selected="selected"'; } ?>><?php echo $wpmk_portfolio_template_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <!-- Select Portfolio Template End -->
            
            <!-- Portfolio Filter Enable Start -->
            <tr>
                <th scope="row">
                    <label for="wpmk_portfolio_filter_enable"><?php _e( 'Enable Portfolio Filters', 'wpmk' ); ?></label>
                </th>
                <td>
                    <input type="checkbox" name="wpmk_portfolio_filter_enable" value="true" id="wpmk_portfolio_filter_enable" <?php if( $wpmk_portfolio_enable_filter == true ){ echo 'checked="checked"'; } ?> /><?php _e( ' If you do not need filters uncheck it. <strong class="wpmk-true">Default is enable</strong> <strong class="wpmk-warning">Note : If this is uncheck than filter sort order will not work.</strong>', 'wpmk' ); ?>
                </td>
            </tr>
            <!-- Portfolio Filter Enable End -->
            
            <!-- Portfolio Filter Sort Start -->
            <tr>
                <th scope="row">
                    <label for="wpmk_portfolio_filter_sort"><?php _e( 'Filter Sort Order', 'wpmk' ); ?></label>
                </th>
                <td>
                    <select name="wpmk_portfolio_filter_sort" id="wpmk_portfolio_filter_sort">
                        <option value="">-- Select Sort Order --</option>
                        <option value="ASC" <?php if( $wpmk_portfolio_filter_sort == 'ASC' ){ echo 'selected="selected"'; } ?>><?php _e( 'Ascending', 'wpmk' ); ?></option>
                        <option value="DESC" <?php if( $wpmk_portfolio_filter_sort == 'DESC' ){ echo 'selected="selected"'; } ?>><?php _e( 'Descending', 'wpmk' ); ?></option>
                    </select>
                    <p><?php _e( '<strong class="wpmk-true">Default Filter Sort Order is Ascending</strong> ', 'wpmk' ); ?></p>
                </td>
            </tr>
            <!-- Portfolio Filter Sort End -->
            
        </tbody>
    </table>
    
    <hr />
    
    <table class="form-table">
        <tbody>
        
            <!-- Portfolio Template Css Disable Start -->
            <tr>
                <th scope="row">
                    <label for="wpmk_portfolio_default_css"><?php _e( 'Disable Portfolio Template Css', 'wpmk' ); ?></label>
                </th>
                <td>
                    <input type="checkbox" name="wpmk_portfolio_default_css" value="true" id="wpmk_portfolio_default_css" <?php if( $wpmk_portfolio_template_css == true ){ echo 'checked="checked"'; } ?> /><?php _e( ' If you do not need plugin css file of templates uncheck it. <strong class="wpmk-true">Default is enable</strong>', 'wpmk' ); ?>
                </td>
            </tr>
            <!-- Portfolio Template Css Disable End -->
        
        </tbody>
    </table>
    
    <hr />
    
    <table class="form-table">
        <tbody>
        
            <!-- Portfolio Template Animation Enable Start -->
            <tr>
                <th scope="row">
                    <label for="wpmk_portfolio_enable_animate_css"><?php _e( 'Enable Template Animation', 'wpmk' ); ?></label>
                </th>
                <td>
                    <input type="checkbox" name="wpmk_portfolio_enable_animate_css" value="1" id="wpmk_portfolio_enable_animate_css" <?php if( $wpmk_portfolio_animate_status == 1 ){ echo 'checked="checked"'; } ?> /><?php _e( ' If you want to use animation in template than check it. <strong class="wpmk-true">Default is enable</strong> <strong class="wpmk-warning">Note : Animation will work after to enable this option, otherwise blow animation options will not work.</strong>', 'wpmk' ); ?>
                </td>
            </tr>
            <!-- Portfolio Template Animation Enable End -->
            
            <!-- Portfolio Template Animation Type Start -->
            <tr>
                <th scope="row">
                    <label for="wpmk_portfolio_animation_type"><?php _e( 'Select Animation Type', 'wpmk' ); ?></label>
                </th>
                <td>
                    <select name="wpmk_portfolio_animation_type" id="wpmk_portfolio_animation_type">
                        <option value="">-- Select Animation Type --</option>
                        <?php foreach( $wpmk_portfolio_animate as $wpmk_portfolio_animate_slug => $wpmk_portfolio_animate_name ) : ?>
                        <option value="<?php echo $wpmk_portfolio_animate_slug; ?>" <?php if( $wpmk_portfolio_current_animate == $wpmk_portfolio_animate_slug ){ echo 'selected="selected"'; } ?>><?php echo $wpmk_portfolio_animate_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <p><?php _e( '<strong class="wpmk-true">Default is none</strong>', 'wpmk' ); ?></p>
                </td>
            </tr>
            <!-- Portfolio Template Animation Type End -->
            
            <!-- Portfolio Template Animation Delay Start -->
            <tr>
                <th scope="row">
                    <label for="wpmk_portfolio_animation_delay"><?php _e( 'Select Animation Delay', 'wpmk' ); ?></label>
                </th>
                <td>
                    <select name="wpmk_portfolio_animation_delay" id="wpmk_portfolio_animation_delay">
                        <option value="">-- Select Animation Delay --</option>
                        <?php foreach( $wpmk_portfolio_animate_delay as $wpmk_portfolio_animate_delay_slug => $wpmk_portfolio_animate_delay_name ) : ?>
                        <option value="<?php echo $wpmk_portfolio_animate_delay_slug; ?>" <?php if( $wpmk_portfolio_current_animate_delay == $wpmk_portfolio_animate_delay_slug ){ echo 'selected="selected"'; } ?>><?php echo $wpmk_portfolio_animate_delay_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <p><?php _e( '<strong class="wpmk-true">Default is Delay - 1s</strong>', 'wpmk' ); ?></p>
                </td>
            </tr>
            <!-- Portfolio Template Animation Delay End -->
            
            <!-- Portfolio Template Animation Speed Start -->
            <tr>
                <th scope="row">
                    <label for="wpmk_portfolio_animation_speed"><?php _e( 'Select Animation Speed', 'wpmk' ); ?></label>
                </th>
                <td>
                    <select name="wpmk_portfolio_animation_speed" id="wpmk_portfolio_animation_speed">
                        <option value="">-- Select Animation Speed --</option>
                        <?php foreach( $wpmk_portfolio_animate_speed as $wpmk_portfolio_animate_speed_slug => $wpmk_portfolio_animate_speed_name ) : ?>
                        <option value="<?php echo $wpmk_portfolio_animate_speed_slug; ?>" <?php if( $wpmk_portfolio_current_animate_speed == $wpmk_portfolio_animate_speed_slug ){ echo 'selected="selected"'; } ?>><?php echo $wpmk_portfolio_animate_speed_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <p><?php _e( '<strong class="wpmk-true">Default is Speed - 1s</strong>', 'wpmk' ); ?></p>
                </td>
            </tr>
            <!-- Portfolio Template Animation Speed End -->
        
        </tbody>
    </table>
    
    <p class="submit">
        <input type="submit" name="wpmk_portfolio_submit" id="submit" class="button button-primary" value="Save Portfolio Settings" />
    </p>
</form>

<h3><?php _e( 'For Use In Theme', 'wpmk' ); ?></h3>
<h4>Developer and Designer</h4>
<table class="form-table">
    <tbody>
    
        <!-- Portfolio Template Css Disable Start -->
        <tr>
            <th scope="row">
                <label for="wpmk_portfolio_default_css"><?php _e( 'How to customization plugin ? ', 'wpmk' ); ?></label>
            </th>
            <td>
                <p><?php _e( 'You can use this plugin in your theme, just copy <code>wpmk_portfolio_items</code> folder in your theme root like <code>twentytwelve/wpmk_portfolio_items</code> and customize it as you like than your template will not over write in any update of plugin.', 'wpmk' ); ?></p>
            </td>
        </tr>
        <!-- Portfolio Template Css Disable End -->
    
    </tbody>
</table>