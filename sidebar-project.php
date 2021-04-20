<?php
$queried_object = get_queried_object();
if ($queried_object) :
    $terms = wp_get_post_terms($queried_object->ID, array( 'project_categories' ));
    ?>

    <!-- Print all tech facts -->
    <strong>Tech. Facts:</strong>
    <ul>
    <?php foreach ($terms as $term) : ?>
        <li><?php echo $term->name; ?></li>
    <?php endforeach; ?>
    </ul>

    <!-- Print all attachment images -->
    <?php
    $post_id = $queried_object->ID;

    $media_set = get_post_meta($post_id, '_media_ids', true);
    $media_set = explode(',', $media_set);

    $attachments = get_posts(array(
        'post_type'      => 'attachment',
        'posts_per_page' => -1,
        'include'        => $media_set
    ));
    foreach ($attachments as $key => $value) {
        echo wp_get_attachment_image($value->ID);
    }
endif; ?>
