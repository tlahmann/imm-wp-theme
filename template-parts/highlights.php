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
    'post_type'      => 'portfolio'
];

//setup your queries as you already do
$query1 = new WP_Query($args1);
$query2 = new WP_Query($args2);

//create new empty query and populate it with the other two
$results = new WP_Query();
$results->posts = array_merge($query1->posts, $query2->posts);
shuffle($results->posts);
$results->posts = array_slice($results->posts, 0, 2);

//populate post_count count for the loop to work correctly
$results->post_count = $query1->post_count + $query2->post_count;

?>

<div class="main-gallery js-flickity" data-flickity-options='{ "cellAlign": "left", "contain": true }'>
    <?php if ($results->have_posts()) : while ($results->have_posts()) : $results->the_post(); ?>
    <div class="gallery-cell">
        <?php the_post_thumbnail(); ?>
    </div>
    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no impression or project found.'); ?></p>
    <?php endif; ?>
</div>
