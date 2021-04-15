<!-- hier Impressionen/Highlights/Neuigkeiten -->
<?php
//-----------------
// Sub query #1:
//-----------------
$args1 = [
    'post_type'      => 'project',
    'meta_query' => [
    [
      'key' => '_highlight',
      'value' => 'is-highlight',
      'compare' => '=='
    ]
  ]
];

//-----------------
// Sub query #2:
//-----------------
$args2 = [
    'post_type'      => 'impression'
];

//setup your queries as you already do
$query1 = new WP_Query($args1);
$query2 = new WP_Query($args2);

//create new empty query and populate it with the other two
$results = new WP_Query();
$results->posts = array_merge($query1->posts, $query2->posts);
shuffle($results->posts);
$results->posts = array_slice($results->posts, 0, 5);

//populate post_count count for the loop to work correctly
$results->post_count = 5;

// echo $results->post_count;
// var_dump($results->posts);
?>

<div class="carousel-gallery">
    <?php if ($results->have_posts()) : while ($results->have_posts()) : $results->the_post(); ?>
    <figure class="highlight">
      <?php the_post_thumbnail(); ?>
    </figure> <!-- End individual project col -->
      
    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no impression or project found.'); ?></p>
    <?php endif; ?>
</div>
