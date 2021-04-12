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
    </div>
    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no impression or project found.'); ?></p>
    <?php endif; ?>
</div>
