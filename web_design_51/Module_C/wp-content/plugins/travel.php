<?php
// Plugin Name: travel

add_action('admin_menu','register_travel_menu');

function register_travel_menu(){
    add_menu_page(
        "旅遊方案",
        "旅遊方案",
        "manage_options",
        "travel_manage",
        "travel_manage",
    );

    function travel_manage(){
        ?>
            <h1>旅遊方案</h1>
            <table>
                <thead>
                    <tr>
                        <th>標題</th>
                        <th>手機</th>
                        <th>地址</th>
                        <th>網址</th>
                        <th>功能</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="" method="post" enctype="multipart/form-data">
                        <tr>
                            <td><input type="text" name="title" id=""></td>
                            <td><input type="text" name="phone" id=""></td>
                            <td><input type="text" name="address" id=""></td>
                            <td><input type="text" name="website" id=""></td>
                            <td><button type="submit" name="ins" class="button-primary">新增</button></td>
                        </tr>
                    </form>
                </tbody>
            </table>
            
        <?php
    }
}