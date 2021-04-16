<!-- hier alle Fächer -->
<?php
echo $args['project_id'];
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
$args = array('post_type' => array('post', 'project'), 'meta_query' => array(array('key' => '_thumbnail_id')) );
query_posts($args);
?>
<div class="row masonry">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <a href="<?php the_permalink(); ?>" class="masonry-brick three columns">
        <figure>
            <?php the_post_thumbnail(); ?>
            <figcaption class="overlay"><?php the_title(); ?></figcaption>
        </figure>
    </a>
    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
</div>
