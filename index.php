<?php get_header(); ?>
<div id="ttr_main" class="row">
    <div id="ttr_content" class="col-lg-8 col-sm-8 col-md-8 col-xs-12">

    <div class="row">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <h1><?php the_title(); ?></h1>
            <h4>Posted on <?php the_time('F jS, Y') ?></h4>
            <p><?php the_content(__('(more...)')); ?></p>
        </div>
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </div>
    <div class="row">
        <?php
        /* Query the post */
        // this will return ALL of the posts from the projects CPT. You can also change this to a specific number such as 'posts_per_page' => 10... 
        $args = array( 'post_type' => 'imm_subject', 'posts_per_page' => -1 );
        // In this line we are telling WP to query the 'projects' CPT
        $loop = new WP_Query( $args );
        // var_dump($loop);
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
</div>
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
