<?php get_header(); ?>

<div class="subject-column">
    <?php
    /* Query the post */
    // this will return ALL of the posts from the projects CPT. You can also change this to a specific number such as 'posts_per_page' => 10... 
    $args = array( 'post_type' => 'subject', 'posts_per_page' => -1 );
    // In this line we are telling WP to query the 'projects' CPT
    $loop = new WP_Query( $args );
    $reverse = true;
    // In this line we are saying keep looping through the 'subjects' CPT until all are returned
    while ( $loop->have_posts() ) : $loop->the_post();
    $reverse = !$reverse;
    ?>

    <div class="row <?php echo $reverse ? 'reverse' : ''; ?>">
        <div class="media three columns">MEDIA</div>
        <div class="description nine columns">
            <h4><?php print get_the_title(); ?></h4>
            <?php print get_the_excerpt(); ?><br />
            <a href="<?php print get_permalink($post->ID) ?>">&rarr;&nbsp;mehr Infos</a> <!-- This returns the featured image with it linked to the page that it was added to-->
        </div>
    </div> <!-- End individual project col -->
    
    <?php endwhile; ?><!-- End of the while loop -->
</div>

<?php get_template_part('template-parts/highlights'); ?>

<!-- </div> -->

<?php get_footer(); ?>
