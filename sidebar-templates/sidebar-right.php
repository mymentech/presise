<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package presise
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_shop() && ! is_active_sidebar( 'shop-sidebar' ) ) {
	return;
}elseif( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'presise_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
<div class="col-md-3 widget-area" id="right-sidebar" role="complementary">
	<?php else : ?>
    <div class="col-md-3 widget-area" id="right-sidebar" role="complementary">
		<?php endif; ?>

        <?php
		if ( is_shop() ) {
			dynamic_sidebar( 'shop-sidebar' );
		} else {
			dynamic_sidebar( 'right-sidebar' );
		}
		?>

    </div><!-- #right-sidebar -->
