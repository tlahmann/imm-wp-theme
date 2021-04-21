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
        <?php $subject_id = get_the_post_subject_id();
        if ( $subject_id !== -1 ): ?>
            <a href="<?php print get_permalink() ?>">&rarr;&nbsp;zum&nbsp;Fach</a>
        <?php endif; ?>
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
            <?php if ( get_the_post_students() !== '' ): ?>
            <span>
                <strong>Studierende:&nbsp;</strong>
                <?php the_post_students();?>
            </span>
            <?php endif; ?>

            <?php if ( $subject_id !== -1 ):  ?>
            <span>
                <strong>Fach:&nbsp;</strong>
                <?php the_post_subject(); ?>
            </span>
            <?php endif; ?>

            <?php if ( get_the_post_term() !== null ): ?>
            <span>
                <strong>Semester:&nbsp;</strong>
                <?php the_post_term(); ?>
            </span>
            <?php endif; ?>

            <?php if ( get_the_post_supervisor_id() !== -1 ): ?>
            <span>
                <strong>Dozent:&nbsp;</strong>
                <?php the_post_supervisor(); ?>
            </span>
            <?php endif; ?>
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
