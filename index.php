<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/skeleton/normalize.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/skeleton/skeleton.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  </head>

  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php get_header(); ?>
    <?php //do_action('get_header'); ?>

    <main role="main" class="container">

        <?php get_template_part('template-parts/highlights'); ?>

        <hr/>
        <!-- hier alle Fächer -->
        <?php
        $args = array('post_type' => array('subject'));
        query_posts($args);
        ?>
        <div class="row">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="three columns">
                <h5><?php the_title(); ?></h5>
            </div>
            <?php endwhile; else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
        <!-- hier alle Projekte -->
        <?php
        $args = array('post_type' => array('post', 'project'));
        query_posts($args);
        ?>
        <div class="row">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="three columns">
                <h5><?php the_title(); ?></h5>
                <?php the_post_thumbnail(); ?>
                <h6>Posted on <?php the_time('F jS, Y') ?></h6>
                <p><?php the_content(__('(more...)')); ?></p>
            </div>
            <?php endwhile; else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
    </main>

    <?php get_footer(); ?>
  </body>
</html>
