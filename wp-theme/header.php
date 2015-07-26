<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package tolerance-break
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>"><!-- UTF-8 -->
		<meta name="viewport" content="width=device-width">
		<meta name="google-site-verification" content="mfgS9JE5XwAZ3a4q8IE9HUuyRs3KptwScCPKhHOmzpM" />

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<!--[if lt IE 9]>
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<header class="header">
			<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="nofollow">
				<img src="<?php bloginfo('template_url') ?>/images/logo_white.png" alt="Tolerance Break">
			</a>
		</header>