<?php get_header(); ?>

<div class="masonry">
    <?php
    /* Query the post */
    // this will return ALL of the posts from the projects CPT. You can also change this to a specific number such as 'posts_per_page' => 10...
    $args = array( 'post_type' => 'impression', 'posts_per_page' => -1 );
    // In this line we are telling WP to query the 'projects' CPT
    $loop = new WP_Query($args);
    // In this line we are saying keep looping through the 'subjects' CPT until all are returned
    while ($loop->have_posts()) : $loop->the_post();
    ?>
        <figure class="masonry-brick">
            <?php echo the_post_thumbnail('full', ['class' => 'masonry-img', 'title' => 'Impression image']); ?> <!-- This returns the featured image with it linked to the page that it was added to-->
            <div class="overlay"><?php print get_the_title(); ?></div>
        </figure> <!-- End individual project col -->
    
    <?php endwhile; ?><!-- End of the while loop -->
</div> <!-- End .masonry -->

<?php get_footer(); ?>
