<?php
/*
Plugin Name:A go back button
Description: Add a go back button on single page
Version: 1.0
Author: Neisandev
Author URI: https://portfolio.neisandev.com
*/

add_filter("goback_menu_pages", "goback_add_back_button", PHP_INT_MAX, 1);
function goback_add_back_button( $array ) {
    $page = array(

        'type' => 'link',
        'name' => __('Go back', 'wpappninja'),
        'label' => __('Go back', 'wpappninja'),
        'id' => 'javascript:document.location=document.referrer;',
        'link' => 'javascript:document.location=document.referrer;',
        'class' => '',
        'icon' => 'arrow_left',
        'icon_2' => 'arrow_left_fill',
        'feat' => '1',
        'menu' => 'tabbar'
    );

    $array[] = $page;


    return $array;
}

add_filter("wp_head", "goback_add_back_button_css", PHP_INT_MAX);
function goback_add_back_button_css() { ?>

    <style>
    .toolbar {
        width: 25%;
        transition:all 0.5s;
        border-radius: 80px;
        overflow: hidden;
        box-shadow: 0 0 5px #333;
        margin: 0 0 5px 5px;
        opacity: 0;
    }
    </style>

    <script>
    jQuery(function() {
        if (document.referrer != "") {
            jQuery(".toolbar").css('opacity', '1');
        } else {
            jQuery(".toolbar").css('display', 'none');
        }
    });
    </script>

<?php }