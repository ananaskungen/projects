<!doctype html>
<html lang="<?php language_attributes(); ?>">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport"
		      content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta name="description" content="">
        <meta name="author" content="">

        <meta property="og:title" content="">
        <meta property="og:type" content="">
        <meta property="og:url" content="">
        <meta property="og:description" content="">
        <meta property="og:image" content="">


		<?php wp_head(); ?>
	</head>
    <body <?php body_class(); ?>>

    <?php get_template_part( 'template-parts/navigation/header' ); ?>
    