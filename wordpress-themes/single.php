
<?php get_header(); ?>
<?php get_template_part('template-parts/heroes/hero', get_post_type()); ?>


<?php 
if ( post_type_supports( get_post_type( get_the_ID() ), 'article' ) && is_single() ) {

    get_template_part('template-parts/content', 'article');
    get_template_part('template-parts/section/form');

}
?>


<?php 


if( have_posts() ) {
    while( have_posts() ) {
        the_post();
        get_template_part('template-parts/content', 'article');
       get_template_part('template-parts/section/form'); 
    }
}

?>


<div class="comments-wrapper section-inner">

<?php comments_template(); ?>

</div><!-- .comments-wrapper -->


</article><!-- .post -->


<?php wp_footer(); ?>
<?php get_footer() ?>