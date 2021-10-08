<?php

// Plugin Name: Speed08

add_action('admin_menu','speed08_manage_setting');

function speed08_manage_setting(){
    add_menu_page(
        'Speed08',
        'Speed08',
        'manage_options',
        'speed08_manage',
        'speed08_manage',
    );

    function speed08_manage(){
        ?><div style="float:right;">已安裝成功</div><?php
    }
}