<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<title><?php wp_title(' - ', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="theme-color" content="#2b82bf"> -->
	<meta charset="<?php bloginfo('charset'); ?>">

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/favicon.png" type="image/x-icon">
	<link rel="icon" href="<?php echo get_template_directory_uri() ?>/favicon.png" type="image/x-icon">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.min.css">
	<?php wp_head(); ?>

</head>

<body>

	<main id="main" class="pt-large">
		<nav id="navbar">

		</nav>