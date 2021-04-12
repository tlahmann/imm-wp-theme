<?php get_header(); ?>

<?php get_template_part('template-parts/highlights'); ?>

<hr/>

<?php get_template_part('template-parts/projects'); ?>

<?php
$types = get_post_types([], 'objects');
foreach ($types as $type) {
    // you'll probably want to do something else.
    var_dump($type);
}
?>

<?php get_footer(); ?>
