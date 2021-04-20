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
        <div class="ten columns">
            <?php the_title('<h4 class="entry-title">', '</h4>'); ?>
            <summary><?php the_excerpt(); ?></summary>
        </div>
        <div class="two columns">
            <a href="<?php print get_permalink(get_the_post_subject_id()) ?>">&rarr;&nbsp;zum&nbsp;Fach</a>
        </div>
    </header><!-- end .row -->

    <div class="row">
        <?php the_post_thumbnail(); ?>
    </div>

    <div class="row">
        <article id="post-<?php the_ID(); ?>" <?php post_class(['eight columns']); ?> >

        <div class="entry-content">
            <?php
            the_content();
            ?>
        </div><!-- .entry-content -->

        <div class="meta-data">
            <span>
                <strong>Studierende:&nbsp;</strong>
                <?php //the_post_students();?>
            </span>

            <span>
                <strong>Fach:&nbsp;</strong>
                <?php the_post_subject(); ?>
            </span>

            <span>
                <strong>Semester:&nbsp;</strong>
                <?php the_post_term(); ?>
            </span>

            <span>
                <strong>Dozent:&nbsp;</strong>
                <?php the_post_supervisor(); ?>
            </span>
        </div>

        </article>

        <aside class="four columns">
            <?php get_sidebar('project'); ?>
        </aside>
    </div> <!-- end .row -->

    </div> <!-- end .project -->


    <?php


endwhile; // End of the loop.

global $post;
$post_meta = get_post_meta($post->ID);

$args = [
    'show_filter'     => false,
    'subject_id'      => array_key_exists('_subject_id', $post_meta) && $post_meta['_subject_id'][0] !== 0 ? $post_meta['_subject_id'][0] : null,
    'exclude_project' => $post->ID
];

get_template_part('template-parts/projects', null, $args);

get_footer();
