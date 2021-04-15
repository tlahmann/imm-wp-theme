<h1>Project Sidebar</h1>

<?php

$queried_object = get_queried_object();

if ($queried_object) {
    $post_id = $queried_object->ID;
    echo get_the_title($post_id);

    $attachments = get_posts( array(
        'post_type' => 'attachment',
        'posts_per_page' => -1,
        'post_parent' => $post_id,
        'exclude'     => get_post_thumbnail_id()
    ) );

    var_dump($attachments);

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
