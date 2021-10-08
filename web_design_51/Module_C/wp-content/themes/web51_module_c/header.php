<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package web51_module_c
 */

 global $wpdb,$post;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?= get_stylesheet_directory_uri() ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= get_stylesheet_directory_uri() ?>/css/main.css">
	<script src="<?= get_stylesheet_directory_uri() ?>/js/jquery.min.js" defer></script>
	<script src="<?= get_stylesheet_directory_uri() ?>/js/bootstrap.min.js" defer></script>
	<?php wp_head(); ?>
</head>

<body>
<?php wp_body_open(); ?>

<div class="header">
	<navbar class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
		<div class="container">
			<a href="<?= home_url('index') ?>" class="navbar-brand">
				<img src="<?= get_stylesheet_directory_uri() ?>/img/logo.png" alt="" width="50">
				<span style="font-size:1.2vw;"><b>高雄旗津旅遊網站</b></span>
			</a>
			<button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
				<span class="navbar-toggler-icon"></span>Menu
			</button>
			<div id="menu" class="collapse navbar-collapse">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item <?= is_page('index')?'active':'' ?>"><a href="<?= home_url('index') ?>" class="nav-link">網站首頁</a></li>
					<li class="nav-item <?= is_page('travel')?'active':'' ?>"><a href="<?= home_url('travel') ?>" class="nav-link">旅遊方案</a></li>
					<li class="nav-item <?= is_page('group')?'active':'' ?>"><a href="<?= home_url('group') ?>" class="nav-link">團購方案</a></li>
					<li class="nav-item <?= is_page('about')?'active':'' ?>"><a href="<?= home_url('about') ?>" class="nav-link">關於我們</a></li>
				</ul>
			</div>
		</div>
	</navbar>
	<h1 class="text-center text-white" style="margin-top:150px;font-size:3vw;"><b>最專業的高雄旗津主題介紹</b></h1>
</div>

<?php if(is_page('index')||is_page('travel')){ ?>
	<div class="bg-secondary">
		<div class="container p-3">
			<div class="row">
				<div class="col-lg-3 col-md-6 my-2">
					<input type="date" name="" id="" class="form-control">
				</div>
				<div class="col-lg-3 col-md-6 my-2">
					<select name="" id="" class="form-control">
						<option value="" hidden>主題</option>
						<option value="">主題1</option>
						<option value="">主題2</option>
						<option value="">主題3</option>
					</select>
				</div>
				<div class="col-lg-3 col-md-6 my-2">
					<select name="" id="" class="form-control">
						<option value="" hidden>地點</option>
						<option value="">地點1</option>
						<option value="">地點2</option>
						<option value="">地點3</option>
					</select>
				</div>
				<div class="col-lg-3 col-md-6 my-2">
					<button type="submit" class="btn btn-light w-100">查詢</button>
				</div>
			</div>
		</div>
	</div>
<?php } ?>