<?php get_header(); ?>


IMPRESSIONS


<div id="content" class="site-content">
    <main id="main" class="site-main" role="main">
        <div class="row">
            <?php
            /* Query the post */
            // this will return ALL of the posts from the projects CPT. You can also change this to a specific number such as 'posts_per_page' => 10... 
            $args = array( 'post_type' => 'imm_subject', 'posts_per_page' => -1 );
            // In this line we are telling WP to query the 'projects' CPT
            $loop = new WP_Query( $args );
            // In this line we are saying keep looping through the 'subjects' CPT until all are returned
            while ( $loop->have_posts() ) : $loop->the_post();
            ?>
            <?php echo '<div class="project">';?>
            <a href="<?php print get_permalink($post->ID) ?>"><?php echo the_post_thumbnail(); ?></a> <!-- This returns the featured image with it linked to the page that it was added to-->
            <h4><?php print get_the_title(); ?></h4>
            <?php print get_the_excerpt(); ?><br />
            <a href="<?php print  get_permalink($post->ID) ?>">Details</a><!-- This wraps the ‘Details’ link with the same url that the featured image gets wrapped in. -->
            </div> <!-- End individual project col -->
            
            <?php endwhile; ?><!-- End of the while loop -->
        </div>
    </main>
    <?php get_sidebar(); ?>
</div>
</div>

<!-- </div> -->

<?php get_footer(); ?>


</body>
</html>
