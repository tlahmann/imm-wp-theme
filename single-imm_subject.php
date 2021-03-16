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

// var_dump($wp_meta_boxes);

/* Start the Loop */
while (have_posts()) :
    the_post();

    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header alignwide">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php //twenty_twenty_one_post_thumbnail(); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
                'after'    => '</nav>',
                /* translators: %: Page number. */
                'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
            )
        );
        ?>
    </div><!-- .entry-content -->

    <?php
    $post_id = get_the_ID();

    $projects = get_projects_for_subject_id( $post_id );
    if ( 0 < count($projects) ) {
        echo '<p>This subject has published ' . count($projects) . ' projects:</p><ul>';
        foreach ( $projects as $project ) {
            $project_link = get_permalink( $project->ID );
            echo '<li><a href="' . $project_link . '">' . $project->post_title . '</a></li>';
        }
        echo '</ul>';
    } else {
        echo '<p>This subject has no published projects on record.</p>';
    }

    $subject_data = get_subject_extra_data_for_subject_id( $post_id );
    if ( array_key_exists('favorite_color', $subject_data ) ) {
        echo '<p>The subjects favorite color is ' . $subject_data['favorite_color'] . '</p>';
    }?>

    <footer class="entry-footer default-max-width">
        <?php //twenty_twenty_one_entry_meta_footer(); ?>
    </footer><!-- .entry-footer -->

    <?php if ( ! is_singular( 'attachment' ) ) : ?>
        <?php //get_template_part( 'template-parts/post/subject-bio' ); ?>
    <?php endif; ?>

    </article><!-- #post-<?php the_ID(); ?> -->
    <?php
    // get_template_part('template-parts/content/content-single');

    if (is_attachment()) {
        // Parent post navigation.
        the_post_navigation(
            array(
                /* translators: %s: Parent post link. */
                'prev_text' => sprintf(__('<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone'), '%title'),
            )
        );
    }

    // If comments are open or there is at least one comment, load up the comment template.
    // if ( comments_open() || get_comments_number() ) {
    //    comments_template();
    // }
    echo get_the_term_list( $post->ID, 'subject_categories', "Projektumsetzung mit:" );

    // Previous/next post navigation.
    // $twentytwentyone_next = is_rtl() ? twenty_twenty_one_get_icon_svg('ui', 'arrow_left') : twenty_twenty_one_get_icon_svg('ui', 'arrow_right');
    // $twentytwentyone_prev = is_rtl() ? twenty_twenty_one_get_icon_svg('ui', 'arrow_right') : twenty_twenty_one_get_icon_svg('ui', 'arrow_left');

    // $twentytwentyone_next_label     = esc_html__('Next post', 'twentytwentyone');
    // $twentytwentyone_previous_label = esc_html__('Previous post', 'twentytwentyone');

    // the_post_navigation(
    //     array(
    //         'next_text' => '<p class="meta-nav">' . $twentytwentyone_next_label . $twentytwentyone_next . '</p><p class="post-title">%title</p>',
    //         'prev_text' => '<p class="meta-nav">' . $twentytwentyone_prev . $twentytwentyone_previous_label . '</p><p class="post-title">%title</p>',
    //     )
    // );
endwhile; // End of the loop.

get_footer();
