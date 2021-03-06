<?php
/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage imm
 * @since imm 1.0
 */

?>

<?php if (has_nav_menu('primary')) : ?>
    <nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary menu', 'imm'); ?>">
        <input type="checkbox" id="hamburg">
        <label for="hamburg" class="hamburg">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </label>
        <?php
        wp_nav_menu(
            array(
                        'theme_location'  => 'primary',
                        'menu_class'      => 'menu-wrapper',
                        'container_class' => 'primary-menu-container',
                        'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
                        'fallback_cb'     => false,
                    )
        );
        ?>
	</nav><!-- #site-navigation -->
<?php endif; ?>
