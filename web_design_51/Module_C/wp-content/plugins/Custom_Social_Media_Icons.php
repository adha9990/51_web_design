<?php
// Plugin Name: Custom Social Media Icons

add_action('init','register_Custom_Social_Media_Icons');

function register_Custom_Social_Media_Icons(){
    add_shortcode('Custom_Social_Media_Icons','Custom_Social_Media_Icons');
}

function Custom_Social_Media_Icons(){
    echo '
        <div class="row">
            <div class="col-4 p-2">
                <a href="https://www.facebook.com"><img src="'.get_stylesheet_directory_uri().'/img/fb_icon_325x325.png" alt="" style="wdith:100%;height:100%;"></a>
            </div>
            <div class="col-4 p-2">
                <a href="https://www.instagram.com"><img src="'.get_stylesheet_directory_uri().'/img/Instagram_logo_2016.svg" alt="" style="wdith:100%;height:100%;"></a>
            </div>
            <div class="col-4 p-2">
                <a href="https://www.twitter.com"><img src="'.get_stylesheet_directory_uri().'/img/Twitter_bird_logo_2012.svg" alt="" style="wdith:100%;height:100%;"></a>
            </div>       
        </div>
    ';
}