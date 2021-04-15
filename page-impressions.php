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
        <figure class="masonry-brick" onclick="openModal('<?php echo get_the_post_thumbnail_url(); ?>', '<?php echo get_the_title() ?>')">
            <?php echo the_post_thumbnail('full', ['class' => 'masonry-img', 'title' => 'Impression image']); ?> <!-- This returns the featured image with it linked to the page that it was added to-->
            <div class="overlay"><?php print get_the_title(); ?></div>
        </figure> <!-- End individual project col -->
    
    <?php endwhile; ?><!-- End of the while loop -->
</div> <!-- End .masonry -->

<div id="lightbox-modal" onclick="closeModal()">
    <div class="modal-content">
        <img id="lightbox-modal-image" src="" alt=""/>
    </div>
    <!-- Caption text -->
    <div class="caption-container">
        <p id="lightbox-modal-caption"></p>
    </div>
</div>

<script>
// Open the Modal
function openModal(url, description) {
    console.log(description)
    const modal = document.getElementById("lightbox-modal");
    modal.className = "show";

    const modal_image = document.getElementById("lightbox-modal-image");
    modal_image.setAttribute('src', url);

    const modal_description = document.getElementById("lightbox-modal-caption");
    modal_description.innerText = description;
}

// Close the Modal
function closeModal() {
    const modal = document.getElementById("lightbox-modal");
    modal.className = "";
}
</script>

<?php get_footer(); ?>
