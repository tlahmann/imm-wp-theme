<h5>Project Sidebar</h5>

<?php

$queried_object = get_queried_object();

if ($queried_object) {
    $post_id = $queried_object->ID;
    echo get_the_title($post_id);

    $media_set = get_post_meta($post_id, '_media_ids', true);
    $media_set = explode(',', $media_set);

    $attachments = get_posts( array(
        'post_type'      => 'attachment',
        'posts_per_page' => -1,
        'include'        => $media_set
    ) );

    // var_dump($attachments);

    foreach ($attachments as $key => $value) {
        echo wp_get_attachment_image($value->ID);
        // echo $value->id;
    }

    // $post_meta = get_post_meta($post_id);
    // var_dump($post_meta);
    // // echo $post_meta['_subject_id'][0];
    // $subject_id = $post_meta['_subject_id'][0];

    // echo 'Projekt durchgeführt in Semester: ' . $post_meta['_term'][0] . '<br/>';

    // $results = new WP_Query(array(
    //     'post_type' => 'subject',
    //     'p' => $subject_id)
    // );// need to set the simple quote '$id'
      
    // if ($results->have_posts()) : while ($results->have_posts()) : $results->the_post();
    // echo 'Projekt durchgeführt in Fach: '; the_title();
    // endwhile; else:
    // _e('Sorry, no impression or project found.');
    // endif;
    
}


?>
