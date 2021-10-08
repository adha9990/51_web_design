<?= get_header() ?>

<?php if(isset($_GET["id"])){ ?>
    <?php $data = $wpdb->get_results("SELECT * FROM `{$post->post_name}s` WHERE `id` = '{$_GET['id']}'")[0]; ?>
    <div class="alert-white p-4">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="text-white bg-secondary p-3"><a href="<?=home_url('index')?>">高雄旗津旅遊網站</a> / <a href="<?=home_url($post->post_name)?>"><?= $post->post_title; ?></a> / <?= $data->title ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-4">
                                <img src="<?= get_stylesheet_directory_uri() ?>/img/abbb.jpg" alt="" style="height:400px;">
                            </div>
                            <div class="col-8">
                                <div class="card-body h-100 position-relative">
                                    <div class="card-title">
                                        <b>景點名稱</b>
                                        <span class="float-right">
                                            <?= shortcode_exists('Custom_Share_Count')?do_shortcode('[Custom_Share_Count]'):'' ?>
                                        </span>
                                    </div>
                                    <div class="card-text">
                                        <table>
                                            <tr>
                                                <td>電話:</td>
                                                <td>
                                                    <a href="tel:<?= $data->phone ?>"><?= $data->phone ?></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>地址:</td>
                                                <td>
                                                    <?= $data->address ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>官方網站:</td>
                                                <td>
                                                    <a href="<?= $data->website ?>"><?= $data->website ?></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <span class="position-absolute fixed-bottom text-right m-4">
                                        <?= shortcode_exists('Custom_Share_Button')?do_shortcode('[Custom_Share_Button]'):'' ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }else{ ?>
    <div class="alert-white p-4">
        <div class="container">
            <div class="row">
                <?php foreach($wpdb->get_results('SELECT * FROM `'.$post->post_name.'s` WHERE 1') as $data){ ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="#">
                            <div class="card" style="height:400px;">
                                <img src="<?= get_stylesheet_directory_uri() ?>/img/abbb.jpg" alt="" style="height:400px;width:100%;">
                                <div class="card-img-overlay" style="top:auto;background-color:rgba(255,255,255,.7);">
                                    <div class="card-title"><b><?= $data->title ?></b></div>
                                    <div class="card-text text-truncate">這是內容</div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

<?= get_footer() ?>