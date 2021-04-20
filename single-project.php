<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

/* Start the Loop */
while (have_posts()) :
    the_post();
    ?>

    <div class="project">
    
    <header class="row">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        <summary><?php the_excerpt(); ?></summary>
    </header><!-- end .row -->

    <div class="row">
        <?php the_post_thumbnail(); ?>
    </div>

    <div class="row">
        <article id="post-<?php the_ID(); ?>" <?php post_class(['eight columns']); ?> >


        <div class="entry-content">
            <?php
            the_content();

            wp_link_pages(
                array(
                    'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'twentytwentyone') . '">',
                    'after'    => '</nav>',
                    /* translators: %: Page number. */
                    'pagelink' => esc_html__('Page %', 'twentytwentyone'),
                )
            );
            ?>
        </div><!-- .entry-content -->


        <?php if (! is_singular('attachment')) : ?>
            <?php //get_template_part( 'template-parts/post/subject-bio' );?>
        <?php endif; ?>

        </article><!-- #post-<?php the_ID(); ?> -->

        <aside class="four columns">
            <?php //var_dump(get_post_meta()); ?>
            <?php get_sidebar('project'); ?>
        </aside>
    </div> <!-- end .row -->

    </div> <!-- end .project -->


    <?php


endwhile; // End of the loop.

global $post;
$post_meta = get_post_meta($post->ID);

get_template_part('template-parts/projects', null, ['subject_id' => $post_meta['_subject_id'][0], 'exclude_project' => $post->ID]);


get_footer();
