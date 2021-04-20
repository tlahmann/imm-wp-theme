<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Imm
 * @since Imm 1.0
 */

// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
    // require get_template_directory() . '/inc/back-compat.php';
}

/**
 * Load script with theme
 */
add_action('wp_enqueue_scripts', 'imm_load_script');

function imm_load_script()
{
    wp_enqueue_script('imm-script', get_template_directory_uri() . './js/imm.js');
}

// Add support for post thumbnails
add_theme_support('post-thumbnails');

function posts_for_current_author($query)
{
    global $pagenow;
 
    if ('edit.php' != $pagenow || !$query->is_admin) {
        return $query;
    }
    if (!current_user_can('edit_others_posts')) {
        global $user_ID;
        $query->set('author', $user_ID);
    }
    return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');

if (! function_exists('imm_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since Imm 1.0
     *
     * @return void
     */
    function imm_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Imm, use a find and replace
         * to change 'imm' to the name of your theme in all the template files.
         */
        load_theme_textdomain('imm', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * This theme does not use a hard-coded <title> tag in the document head,
         * WordPress will provide it for us.
         */
        add_theme_support('title-tag');

        /**
         * Add post-formats support.
         */
        add_theme_support(
            'post-formats',
            array(
                'link',
                'aside',
                'gallery',
                'image',
                'quote',
                'status',
                'video',
                'audio',
                'chat',
            )
        );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1568, 9999);

        register_nav_menus(
            array(
                'primary' => esc_html__('Primary menu', 'imm'),
                'footer'  => __('Secondary menu', 'imm'),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
                'navigation-widgets',
            )
        );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        $logo_width  = 300;
        $logo_height = 100;

        add_theme_support(
            'custom-logo',
            array(
                'height'               => $logo_height,
                'width'                => $logo_width,
                'flex-width'           => true,
                'flex-height'          => true,
                'unlink-homepage-logo' => true,
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for editor styles.
        add_theme_support('editor-styles');

        // Add custom editor font sizes.
        add_theme_support(
            'editor-font-sizes',
            array(
                array(
                    'name'      => esc_html__('Extra small', 'imm'),
                    'shortName' => esc_html_x('XS', 'Font size', 'imm'),
                    'size'      => 16,
                    'slug'      => 'extra-small',
                ),
                array(
                    'name'      => esc_html__('Small', 'imm'),
                    'shortName' => esc_html_x('S', 'Font size', 'imm'),
                    'size'      => 18,
                    'slug'      => 'small',
                ),
                array(
                    'name'      => esc_html__('Normal', 'imm'),
                    'shortName' => esc_html_x('M', 'Font size', 'imm'),
                    'size'      => 20,
                    'slug'      => 'normal',
                ),
                array(
                    'name'      => esc_html__('Large', 'imm'),
                    'shortName' => esc_html_x('L', 'Font size', 'imm'),
                    'size'      => 24,
                    'slug'      => 'large',
                ),
                array(
                    'name'      => esc_html__('Extra large', 'imm'),
                    'shortName' => esc_html_x('XL', 'Font size', 'imm'),
                    'size'      => 40,
                    'slug'      => 'extra-large',
                ),
                array(
                    'name'      => esc_html__('Huge', 'imm'),
                    'shortName' => esc_html_x('XXL', 'Font size', 'imm'),
                    'size'      => 96,
                    'slug'      => 'huge',
                ),
                array(
                    'name'      => esc_html__('Gigantic', 'imm'),
                    'shortName' => esc_html_x('XXXL', 'Font size', 'imm'),
                    'size'      => 144,
                    'slug'      => 'gigantic',
                ),
            )
        );

        // Custom background color.
        add_theme_support(
            'custom-background',
            array(
                'default-color' => 'd1e4dd',
            )
        );

        // Editor color palette.
        $black     = '#000000';
        $dark_gray = '#28303D';
        $gray      = '#39414D';
        $green     = '#D1E4DD';
        $blue      = '#D1DFE4';
        $purple    = '#D1D1E4';
        $red       = '#E4D1D1';
        $orange    = '#E4DAD1';
        $yellow    = '#EEEADD';
        $white     = '#FFFFFF';

        add_theme_support(
            'editor-color-palette',
            array(
                array(
                    'name'  => esc_html__('Black', 'imm'),
                    'slug'  => 'black',
                    'color' => $black,
                ),
                array(
                    'name'  => esc_html__('Dark gray', 'imm'),
                    'slug'  => 'dark-gray',
                    'color' => $dark_gray,
                ),
                array(
                    'name'  => esc_html__('Gray', 'imm'),
                    'slug'  => 'gray',
                    'color' => $gray,
                ),
                array(
                    'name'  => esc_html__('Green', 'imm'),
                    'slug'  => 'green',
                    'color' => $green,
                ),
                array(
                    'name'  => esc_html__('Blue', 'imm'),
                    'slug'  => 'blue',
                    'color' => $blue,
                ),
                array(
                    'name'  => esc_html__('Purple', 'imm'),
                    'slug'  => 'purple',
                    'color' => $purple,
                ),
                array(
                    'name'  => esc_html__('Red', 'imm'),
                    'slug'  => 'red',
                    'color' => $red,
                ),
                array(
                    'name'  => esc_html__('Orange', 'imm'),
                    'slug'  => 'orange',
                    'color' => $orange,
                ),
                array(
                    'name'  => esc_html__('Yellow', 'imm'),
                    'slug'  => 'yellow',
                    'color' => $yellow,
                ),
                array(
                    'name'  => esc_html__('White', 'imm'),
                    'slug'  => 'white',
                    'color' => $white,
                ),
            )
        );

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        // Add support for custom line height controls.
        add_theme_support('custom-line-height');

        // Add support for experimental link color control.
        add_theme_support('experimental-link-color');

        // Add support for experimental cover block spacing.
        add_theme_support('custom-spacing');

        // Add support for custom units.
        // This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
        add_theme_support('custom-units');
    }
}
add_action('after_setup_theme', 'imm_setup');

/**
 * Calculate classes for the main <html> element.
 *
 * @since Imm 1.0
 *
 * @return void
 */
function imm_the_html_classes()
{
    $classes = apply_filters('imm_html_classes', '');
    if (! $classes) {
        return;
    }
    echo 'class="' . esc_attr($classes) . '"';
}

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Imm 1.0
 *
 * @return void
 */
function imm_add_ie_class()
{
    ?>
	<script>
	if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action('wp_footer', 'imm_add_ie_class');

/* Flush rewrite rules for custom post types. */
add_action('after_switch_theme', 'imm_flush_rewrite_rules');
/* Flush your rewrite rules */
function imm_flush_rewrite_rules()
{
    flush_rewrite_rules();
}

/**
 * Echoes the post's supervisor
 *
 * @since 0.2.7
 */
function the_post_supervisor(): void
{
    echo get_the_post_supervisor(null);
}

/**
 * Echoes the post's supervisor
 *
 * @since 0.2.7
 *
 * @param int|WP_Post  $post Optional. Post ID or WP_Post object.  Default is global `$post`.
 */
function get_the_post_supervisor($post = null)
{
    $post = get_post($post);

    if (! $post) {
        return '';
    }

    $supervisor_id = get_post_meta($post->ID, '_supervisor_id', true);

    if (! $supervisor_id) {
        return '';
    }

    $supervisor = get_post($supervisor_id);

    return $supervisor->name;
}

/**
 * Echoes the post's term
 *
 * @since 0.2.7
 */
function the_post_term(): void
{
    echo get_the_post_term(null);
}

/**
 * Echoes the post's term
 *
 * @since 0.2.7
 *
 * @param int|WP_Post  $post Optional. Post ID or WP_Post object.  Default is global `$post`.
 */
function get_the_post_term($post = null)
{
    $post = get_post($post);

    if (! $post) {
        return null;
    }

    $term = get_post_meta($post->ID, '_term', true);
    
    if (! $term) {
        return null;
    }
    $term = explode('-', $term);
    return ($term[1] == 1 ? _e('Wintersemester') : _e('Sommersemester')) . ' ' . $term[0];
}

/**
 * Echoes the post's subject
 *
 * @since 0.2.7
 */
function the_post_subject(): void
{
    echo get_the_post_subject(null);
}

/**
 * Echoes the post's subject
 *
 * @since 0.2.7
 *
 * @param int|WP_Post  $post Optional. Post ID or WP_Post object.  Default is global `$post`.
 */
function get_the_post_subject($post = null): string
{
    $post = get_post($post);

    if (! $post) {
        return '';
    }

    $subject_id = get_the_post_subject_id();

    if (! $subject_id) {
        return '';
    }

    $subject = get_post($subject_id);

    return $subject->post_name;
}

/**
 * Echoes the post's subject
 *
 * @since 0.2.7
 *
 * @param int|WP_Post  $post Optional. Post ID or WP_Post object.  Default is global `$post`.
 */
function get_the_post_subject_id($post = null): int
{
    $post = get_post($post);

    if (! $post) {
        return null;
    }
    $subject_id = get_post_meta($post->ID, '_subject_id', true);

    return $subject_id;
}
