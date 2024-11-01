<?php

/**
 * 
 * Option that show all animate.css
 * it will show all classes of animate.css
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$wpmk_animate_classes_arg = array(
    'bounce' => 'Bounce',
    'flash' => 'Flash',
    'pulse' => 'Pulse',
    'rubberBand' => 'Rubber Band',
    'shake' => 'Shake',
    'headShake' => 'Head Shake',
    'swing' => 'Swing',
    'tada' => 'Tada',
    'bounceInLeft' => 'Bounce In Left',
    'bounceInRight' => 'Bounce In Right',
    'bounceInUp' => 'Bounce In Up',
    //'bounceOut' => 'Bounce Out',
    //'bounceOutDown' => 'Bounce Out Down',
    //'bounceOutLeft' => 'Bounce Out Left',
    //'bounceOutRight' => 'Bounce Out Right',
    //'bounceOutUp' => 'Bounce Out Up',
    'fadeIn' => 'Fade In',
    'fadeInDown' => 'Fade In Down',
    'fadeInDownBig' => 'Fade In Down Big',
    'fadeInLeft' => 'Fade In Left',
    'fadeInLeftBig' => 'Fade In Left Big',
    'fadeInRight' => 'Fade In Right',
    'fadeInRightBig' => 'Fade In Right Big',
    'fadeInUp' => 'Fade In Up',
    'fadeInUpBig' => 'Fade In Up Big',
    //'fadeOut' => 'Fade Out',
    //'fadeOutDown' => 'Fade Out Down',
    //'fadeOutDownBig' => 'Fade Out Down Big',
    //'fadeOutLeft' => 'Fade Out Left',
    //'fadeOutLeftBig' => 'Fade Out Left Big',
    //'fadeOutRight' => 'Fade Out Right',
    //'fadeOutRightBig' => 'Fade Out Right Big',
    //'fadeOutUp' => 'Fade Out Up',
    //'fadeOutUpBig' => 'Fade Out Up Big',
    'flipInX' => 'Flip In X',
    'flipInY' => 'Flip In Y',
    //'flipOutX' => 'Flip Out X',
    //'flipOutY' => 'Flip Out Y',
    'lightSpeedIn' => 'Light Speed In',
    //'lightSpeedOut' => 'Light Speed Out',
    'rotateIn' => 'Rotate In',
    'rotateInDownLeft' => 'Rotate In Down Left',
    'rotateInDownRight' => 'Rotate In Down Right',
    'rotateInUpLeft' => 'Rotate In Up Left',
    'rotateInUpRight' => 'Rotate In Up Right',
    //'rotateOut' => 'Rotate Out',
    //'rotateOutDownLeft' => 'Rotate Out Down Left',
    //'rotateOutDownRight' => 'Rotate Out Down Right',
    //'rotateOutUpLeft' => 'Rotate Out Up Left',
    //'rotateOutUpRight' => 'Rotate Out Up Right',
    'hinge' => 'Hinge',
    'jackInTheBox' => 'Jack In The Box',
    'rollIn' => 'Roll In',
    //'rollOut' => 'Roll Out',
    'zoomIn' => 'Zoom In',
    'zoomInDown' => 'Zoom In Down',
    'zoomInLeft' => 'Zoom In Left',
    'zoomInRight' => 'Zoom In Right',
    'zoomInUp' => 'Zoom In Up',
    //'zoomOut' => 'Zoom Out',
    //'zoomOutDown' => 'Zoom Out Down',
    //'zoomOutLeft' => 'Zoom Out Left',
    //'zoomOutRight' => 'Zoom Out Right',
    //'zoomOutUp' => 'Zoom Out Up',
    'slideInDown' => 'Slide In Down',
    'slideInLeft' => 'Slide In Left',
    'slideInRight' => 'Slide In Right',
    'slideInUp' => 'Slide In Up',
    //'slideOutDown' => 'Slide Out Down',
    //'slideOutLeft' => 'Slide Out Left',
    //'slideOutRight' => 'Slide Out Right',
    //'slideOutUp' => 'Slide Out Up',
    'heartBeat' => 'Heart Beat',
);

add_option('wpmk_portfolio_animate', $wpmk_animate_classes_arg );

$wpmk_animate_delay_arg = array(
    'delay-2s' => 'Delay - 2s',
    'delay-3s' => 'Delay - 3s',
    'delay-4s' => 'Delay - 4s',
    'delay-5s' => 'Delay - 5s',
);

add_option('wpmk_portfolio_animate_delay', $wpmk_animate_delay_arg );

$wpmk_animate_speed_arg = array(
    'slow' => 'Speed - 2s',
    'slower' => 'Speed - 3s',
    'fast' => 'Speed - 800ms',
    'faster' => 'Speed - 500ms',
);

add_option('wpmk_portfolio_animate_speed', $wpmk_animate_speed_arg );
?>