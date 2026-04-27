<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Modern Fashion Store
 * @subpackage modern_fashion_store
 */
?>
<?php

// Determine the number of columns dynamically for the footer (you can replace this with your logic).
$modern_fashion_store_no_of_footer_col = get_theme_mod('modern_fashion_store_footer_columns', 4); // Change this value as needed.

// Calculate the Bootstrap class for large screens (col-lg-X) for footer.
$modern_fashion_store_col_lg_footer_class = 'col-lg-' . (12 / $modern_fashion_store_no_of_footer_col);

// Calculate the Bootstrap class for medium screens (col-md-X) for footer.
$modern_fashion_store_col_md_footer_class = 'col-md-' . (12 / $modern_fashion_store_no_of_footer_col);
?>
<div class="container">
    <aside class="widget-area row py-2 pt-3" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'modern-fashion-store' ); ?>">
        <?php
        $modern_fashion_store_default_widgets = array(
            1 => 'search',
            2 => 'archives',
            3 => 'meta',
            4 => 'categories'
        );

        for ($modern_fashion_store_i = 1; $modern_fashion_store_i <= $modern_fashion_store_no_of_footer_col; $modern_fashion_store_i++) :
            $modern_fashion_store_lg_class = esc_attr($modern_fashion_store_col_lg_footer_class);
            $modern_fashion_store_md_class = esc_attr($modern_fashion_store_col_md_footer_class);
            echo '<div class="col-12 ' . $modern_fashion_store_lg_class . ' ' . $modern_fashion_store_md_class . '">';

            if (is_active_sidebar('footer-' . $modern_fashion_store_i)) {
                dynamic_sidebar('footer-' . $modern_fashion_store_i);
            } else {
                // Display default widget content if not active.
                switch ($modern_fashion_store_default_widgets[$modern_fashion_store_i] ?? '') {
                    case 'search':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Search', 'modern-fashion-store'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Search', 'modern-fashion-store'); ?></h3>
                            <?php get_search_form(); ?>
                        </aside>
                        <?php
                        break;

                    case 'archives':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Archives', 'modern-fashion-store'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Archives', 'modern-fashion-store'); ?></h3>
                            <ul><?php wp_get_archives(['type' => 'monthly']); ?></ul>
                        </aside>
                        <?php
                        break;

                    case 'meta':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Meta', 'modern-fashion-store'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Meta', 'modern-fashion-store'); ?></h3>
                            <ul>
                                <?php wp_register(); ?>
                                <li><?php wp_loginout(); ?></li>
                                <?php wp_meta(); ?>
                            </ul>
                        </aside>
                        <?php
                        break;

                    case 'categories':
                        ?>
                        <aside class="widget" role="complementary" aria-label="<?php esc_attr_e('Categories', 'modern-fashion-store'); ?>">
                            <h3 class="widget-title"><?php esc_html_e('Categories', 'modern-fashion-store'); ?></h3>
                            <ul><?php wp_list_categories(['title_li' => '']); ?></ul>
                        </aside>
                        <?php
                        break;
                }
            }

            echo '</div>';
        endfor;
        ?>
    </aside>
</div>