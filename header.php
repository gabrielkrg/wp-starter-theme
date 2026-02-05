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
					<div class="container mx-auto px-4">
						<div class="flex justify-between items-center">
							<div class="w-1/12">
								<div id="menu">menu</div>
							</div>

							<div class="flex-auto">
								<div id="logo">
									<a href="<?= get_site_url(); ?>">logo</a>
								</div>
							</div>

							<div class="w-1/12">
								<div id="search">search</div>
							</div>
						</div>
					</div>
				</div>

				<div class="bottom">
					<div class="container mx-auto px-4">
						<div class="flex">
							<div class="w-full">
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

			<div id="search-content" class="hidden">
				<div class="container mx-auto px-4">
					<div class="flex">
						<div class="w-full">
							<div class="wrapper">
								<div id="close">fechar</div>
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>
				</div>

			</div>
		</header>

		<div id="side-menu" class="hidden">
			<div id="close">fechar</div>
			<?php

			$args = [
				'theme_location' => 'secondary_menu',
			];

			wp_nav_menu($args);

			?>
		</div>

		<div id="layer" class="hidden"></div>