<?php
// Plugin Name: Custom Share Button

add_action('init','register_Custom_Share');

function register_Custom_Share(){
    add_shortcode('Custom_Share_Button','Custom_Share_Button');
    add_shortcode('Custom_Share_Count','Custom_Share_Count');
}

if(isset($_POST['share'])){
    global $wpdb;
    $table_name = $_POST["table_name"];
    $table_id = $_GET["id"];
    $type = $_POST['share'];
    $wpdb->insert("share_counts",[
        "table_name" => $table_name,
        "table_id" => $table_id,
        "type" => $type,
    ]);
}

function Custom_Share_Button(){
    global $wpdb,$post;
    $table_name = $post->post_name;
    echo '
        <form action="" method="post">
            <input type="hidden" name="table_name" value="'.$table_name.'">
            <label>
                <img src="'.get_stylesheet_directory_uri().'/img/fb_icon_325x325.png" alt="" style="width:25px;height:25px;cursor: pointer;">
                <button type="submit" name="share" value="facebook" style="display:none;"></button>
            </label>
            <label>
                <img src="'.get_stylesheet_directory_uri().'/img/Instagram_logo_2016.svg" alt="" style="width:25px;height:25px;cursor: pointer;">
                <button type="submit" name="share" value="instagram" style="display:none;"></button>
            </label>
            <label>
                <img src="'.get_stylesheet_directory_uri().'/img/Twitter_bird_logo_2012.svg" alt="" style="width:25px;height:25px;cursor: pointer;">
                <button type="submit" name="share" value="twitter" style="display:none;"></button>
            </label>
        </form>
    ';
}

function Custom_Share_Count(){
    global $wpdb,$post;
    $table_name = $post->post_name;
    $table_id = $_GET["id"];
    $fb = $wpdb->get_results("SELECT * FROM `share_counts` WHERE `table_name` = '$table_name' AND `table_id` = '$table_id' AND `type` = 'facebook'");
    $ig = $wpdb->get_results("SELECT * FROM `share_counts` WHERE `table_name` = '$table_name' AND `table_id` = '$table_id' AND `type` = 'instagram'");
    $tw = $wpdb->get_results("SELECT * FROM `share_counts` WHERE `table_name` = '$table_name' AND `table_id` = '$table_id' AND `type` = 'twitter'");
    echo '
    <span class="badge badge-light shadow-sm">
        <img src="'.get_stylesheet_directory_uri().'/img/fb_icon_325x325.png" alt="" style="width:25px;height:25px;">
        '.count($fb).'
    </span>
    <span class="badge badge-light shadow-sm">
        <img src="'.get_stylesheet_directory_uri().'/img/Instagram_logo_2016.svg" alt="" style="width:25px;height:25px;">
        '.count($ig).'
    </span>
    <span class="badge badge-light shadow-sm">
        <img src="'.get_stylesheet_directory_uri().'/img/Twitter_bird_logo_2012.svg" alt="" style="width:25px;height:25px;">
        '.count($tw).'
    </span>
    ';
}