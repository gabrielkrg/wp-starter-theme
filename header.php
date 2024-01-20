<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<title><?php wp_title(' - ', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="theme-color" content="#2b82bf"> -->
	<meta charset="<?php bloginfo('charset'); ?>">

	<?php wp_head(); ?>

</head>

<body>

	<main id="main" class="pt-large">
		<header id="header">
			<nav id="navbar">

				<div class="top">
					<div class="container">
						<div class="row justify-content-between">
							<div class="col-auto">
								<div id="menu">menu</div>
							</div>

							<div class="col-auto">
								<div id="logo">
									<a href="<?= get_site_url(); ?>">logo</a>
								</div>
							</div>

							<div class="col-auto">
								<div id="search">search</div>
							</div>
						</div>
					</div>
				</div>

				<div class="bottom">
					<div class="container">
						<div class="row">
							<?php

							$args = [
								'theme_location' => 'primary_menu',
							];

							wp_nav_menu($args);

							?>
						</div>
					</div>
				</div>
			</nav>

			<?php get_search_form(); ?>

			<div id="side-menu">
				<?php

				$args = [
					'theme_location' => 'secondary_menu',
				];

				wp_nav_menu($args);

				?>
			</div>
		</header>