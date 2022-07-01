
<?php get_header() ?>

<!-- < ?php get_template_part('template-parts/heroes/hero', get_post_type()); ?>
< ?php get_template_part('template-parts/section/buttons'); ?>
< ?php get_template_part('template-parts/section/featured-travel'); ?>
< ?php get_template_part('template-parts/section/travel-video'); ?>
< ?php get_template_part('template-parts/section/form'); ?>
< ?php get_template_part('template-parts/section/newsletter'); ?>
< ?php get_template_part('template-parts/section/featured-section'); ?>
 -->
 <?php do_shortcode('[våran_shortcode]'); ?>

<?php wp_footer(); ?>
<?php get_footer() ?>