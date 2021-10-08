<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package web51_module_c
 */

?>

	<footer class="navbar-dark bg-dark text-white p-4">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<ul class="navbar-nav">
						<li class="nav-item active"><a href="#" class="nav-link">相關連結標題</a></li>
						<li class="nav-item"><a href="#" class="nav-link">相關連結</a></li>
						<li class="nav-item"><a href="#" class="nav-link">相關連結</a></li>
						<li class="nav-item"><a href="#" class="nav-link">相關連結</a></li>
					</ul>
				</div>
				<div class="col-md-3">
					<ul class="navbar-nav">
						<li class="nav-item active"><a href="#" class="nav-link">相關連結標題</a></li>
						<li class="nav-item"><a href="#" class="nav-link">相關連結</a></li>
						<li class="nav-item"><a href="#" class="nav-link">相關連結</a></li>
						<li class="nav-item"><a href="#" class="nav-link">相關連結</a></li>
					</ul>
				</div>
				<div class="col-md-3">
					<ul class="navbar-nav">
						<li class="nav-item active"><a href="#" class="nav-link">相關連結標題</a></li>
						<li class="nav-item"><a href="#" class="nav-link">相關連結</a></li>
						<li class="nav-item"><a href="#" class="nav-link">相關連結</a></li>
						<li class="nav-item"><a href="#" class="nav-link">相關連結</a></li>
					</ul>
				</div>
				<div class="col-md-3">
					<?= shortcode_exists('Custom_Social_Media_Icons')?do_shortcode('[Custom_Social_Media_Icons]'):'' ?>
				</div>
			</div>
		</div>
		<div class="text-center">Copyright © KCT 2021 - All rights reserved</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
