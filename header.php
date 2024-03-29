<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#2b82bf">
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
							<div class="col-1">
								<div id="menu">menu</div>
							</div>

							<div class="col-auto">
								<div id="logo">
									<a href="<?= get_site_url(); ?>">logo</a>
								</div>
							</div>

							<div class="col-1">
								<div id="search">search</div>
							</div>
						</div>
					</div>
				</div>

				<div class="bottom">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php

								$args = [
									'theme_location' => 'primary_menu',
								];

								wp_nav_menu($args);

								?>
							</div>
						</div>
					</div>
				</div>
			</nav>

			<div id="search-content">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="wrapper">
								<div id="close">fechar</div>
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>
				</div>

			</div>
		</header>

		<div id="side-menu">
			<div id="close">fechar</div>
			<?php

			$args = [
				'theme_location' => 'secondary_menu',
			];

			wp_nav_menu($args);

			?>
		</div>

		<div id="layer"></div>