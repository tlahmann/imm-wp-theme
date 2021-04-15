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
<div class="masonry">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <a href="<?php the_permalink(); ?>">
        <div class="masonry-brick">
        <figure>
            <?php the_post_thumbnail(); ?>
            <div class="overlay"><?php the_title(); ?></div>
        </figure>
        </div> <!-- End individual project col -->
    </a>
    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
</div>
