<!-- hier alle Fächer -->
<?php
if (isset($args['project_id'])) {
    $excludeProject = array($args['project_id']);
}
if (isset($args['subject_id'])) {
    echo $args['subject_id'];
}
$args = array(
    'post_type' => array('subject')
);
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
$args = array(
    'post_type'  => array('post', 'project'),
    'exclude'    => $excludeProject,
    'meta_query' => array(
        array('key' => '_thumbnail_id')
    )
);
$projects = get_posts($args);
?>
<div class="row masonry">
    <?php if (0 !== count($projects)) : foreach ( $projects as $post ) : setup_postdata( $post ); ?>
    <a href="<?php the_permalink(); ?>" class="masonry-brick three columns">
        <figure>
            <?php the_post_thumbnail(); ?>
            <figcaption class="overlay"><?php the_title(); the_ID(); ?></figcaption>
        </figure>
    </a>
    <?php endforeach; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
</div>
