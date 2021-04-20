<?php
/**
 * Projects wall with subject filter.
 *
 * The filter is only shown if the template-part's argument does not include 'subject_id'
 */

// Get the project id. Used to exclude this project(s) in the query
if (array_key_exists('exclude_project', $args) && isset($args['exclude_project'])) {
    $exclude_projects = is_array($args['exclude_project']) ? $args['exclude_project'] : array($args['exclude_project']);
} else {
    $exclude_projects = array();
}
?>

 <!-- Subject 'filter' -->
<?php
// Get the subject id. When set the projects are filtered to this specific subject
if (!array_key_exists('subject_id', $args) || !isset($args['subject_id'])) :
    $subject_args = array(
        'post_type' => array('subject')
    );
    $subjects = get_posts($subject_args);
    ?>
    <div class="project-filter">
        <?php if (0 !== count($subjects)) : foreach ($subjects as $subject) : ?>

        <button class="filter-button"><?php echo $subject->post_title; ?></button>

        <?php endforeach; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </div>
<?php
else:
    $parent_subject = $args['subject_id'];
endif;
?> <!-- End subject 'filter' -->

<!-- hier alle Projekte -->
<?php
$meta_args = array(
    array('key' => '_thumbnail_id')
);

if (isset($parent_subject)) {
    $meta_args = array_merge($meta_args, array('key' => '_subject_id', 'value' => intval($parent_subject)));
}

$args = array(
    'post_type'  => array('post', 'project'),
    'exclude'    => $exclude_projects,
    'meta_query' => $meta_args
);
$projects = get_posts($args);
?>
<div class="row masonry">
    <?php if (0 !== count($projects)) : foreach ($projects as $post) : setup_postdata($post); ?>
    <a href="<?php the_permalink(); ?>" class="masonry-brick three columns">
        <figure>
            <?php the_post_thumbnail(); ?>
            <figcaption class="overlay"><?php the_title(); ?></figcaption>
        </figure>
    </a>
    <?php endforeach; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
</div>
