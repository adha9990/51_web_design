<?= get_header() ?>

<div id="carousel" class="carousel slide" data-ride="carousel" style="height:400px;">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= get_stylesheet_directory_uri() ?>/img/ffuck.jpg" alt="" style="height:400px;width:100%;">
        </div>
        <div class="carousel-item">
            <img src="<?= get_stylesheet_directory_uri() ?>/img/eewd.jpg" alt="" style="height:400px;width:100%;">
        </div>
        <div class="carousel-item">
            <img src="<?= get_stylesheet_directory_uri() ?>/img/wdaw.jpg" alt="" style="height:400px;width:100%;">
        </div>
        <div class="carousel-item">
            <img src="<?= get_stylesheet_directory_uri() ?>/img/abbb.jpg" alt="" style="height:400px;width:100%;">
        </div>
    </div>
    <a href="#carousel" class="carousel-control-prev" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
    <a href="#carousel" class="carousel-control-next" data-slide="next"><span class="carousel-control-next-icon"></span></a>
</div>

<div class="alert-secondary p-4">
    <h3 class="text-center"><b>最新旅遊消息</b></h3>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <a href="#">
                    <div class="card" style="height:400px;">
                        <img src="<?= get_stylesheet_directory_uri() ?>/img/abbb.jpg" alt="" style="height:400px;width:100%;">
                        <div class="card-img-overlay" style="top:auto;background-color:rgba(255,255,255,.7);">
                            <div class="card-title"><b>title</b></div>
                            <div class="card-text">content</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <?php foreach(range(1,4) as $i){ ?>
                        <div class="col-md-6 p-0">
                            <a href="#">
                                <div class="card" style="height:200px;">
                                    <img src="<?= get_stylesheet_directory_uri() ?>/img/abbb.jpg" alt="" style="height:400px;width:100%;">
                                    <div class="card-img-overlay" style="top:auto;background-color:rgba(255,255,255,.7);">
                                        <div class="card-title"><b>title</b></div>
                                        <div class="card-text">content</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="alert-white p-4">
    <h3 class="text-center"><b>熱門旅遊景點</b></h3>
    <div class="container">
        <div class="row">
            <?php foreach(range(1,6) as $i){ ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="#">
                        <div class="card" style="height:400px;">
                            <img src="<?= get_stylesheet_directory_uri() ?>/img/abbb.jpg" alt="" style="height:400px;width:100%;">
                            <div class="card-img-overlay" style="top:auto;background-color:rgba(255,255,255,.7);">
                                <div class="card-title"><b>title</b></div>
                                <div class="card-text">content</div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="alert-secondary p-4">
    <h3 class="text-center"><b>相關連結</b></h3>
    <div class="container">
        <div class="row">
            <?php foreach(range(1,6) as $i){ ?>
                <div class="col-12 mb-2 navbar-dark bg-dark text-white">
                    <ul class="navbar-nav">
                        <li class="nav-item my-2"><a href="#" class="nav-link">連結</a></li>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?= get_footer() ?>