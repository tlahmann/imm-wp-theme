<?php get_header(); ?>

<main role="main">

        <!-- hier Impressionen/Highlights/Neuigkeiten -->
        <?php
        $args = array(
            'post_type' => array('portfolio', 'project'),
            'meta_query' => array(
                array(
                  'key' => '_highlight',
                  'value' => 'is-highlight',
                  'compare' => '=='
                )
              )
            );
        query_posts($args);
        ?>
        <div class="row">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="three columns">
                <?php the_post_thumbnail(); ?>
                <p><?php the_content(__('(more...)')); ?></p>
            </div>
            <?php endwhile; else: ?>
            <p><?php _e('Sorry, no impression or project found.'); ?></p>
            <?php endif; ?>
        </div>

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
    <?php //get_sidebar();?>
</div>

<!-- </div> -->

<?php get_footer(); ?>


</body>
</html>
