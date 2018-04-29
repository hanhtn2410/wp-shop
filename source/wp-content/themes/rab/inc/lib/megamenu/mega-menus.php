<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;    // exit if accessed directly
}

// Add the first level menu style dropdown to the menu fields.
add_action( 'wp_nav_menu_item_custom_fields', 'rab_add_menu_button_fields', 10, 4 );
/**
 * Adds the menu button fields.
 *
 * @param string $item_id The ID of the menu item.
 * @param object $item    The menu item object.
 * @param int    $depth   The depth of the current item in the menu.
 * @param array  $args    Menu arguments.
 */
function rab_add_menu_button_fields( $item_id, $item, $depth, $args ) {
	$name  = 'menu-item-rab-menu-style';
	?>
	<p class="description description-wide rab-menu-style">
		<label for="<?php echo $name . '-' . $item_id; ?>>">
			<?php esc_attr_e( 'Menu First Level Style', 'rab' ); ?><br />
			<select id="<?php echo $name . '-' . $item_id; ?>" class="widefat edit-menu-item-target" name="<?php echo $name . '[' . $item_id . ']'; ?>">
				<option value="" <?php selected( $item->rab_menu_style, '' ); ?>><?php esc_attr_e( 'Default Style', 'rab' ); ?></option>
				<option value="rab-heading" <?php selected( $item->rab_menu_style, 'rab-heading' ); ?>><?php esc_attr_e( 'Heading', 'rab' ); ?></option>
				<option value="rab-button-small" <?php selected( $item->rab_menu_style, 'rab-button-small' ); ?>><?php esc_attr_e( 'Button Small', 'rab' ); ?></option>
				<option value="rab-button-medium" <?php selected( $item->rab_menu_style, 'rab-button-medium' ); ?>><?php esc_attr_e( 'Button Medium', 'rab' ); ?></option>
				<option value="rab-button-large" <?php selected( $item->rab_menu_style, 'rab-button-large' ); ?>><?php esc_attr_e( 'Button Large', 'rab' ); ?></option>
				<option value="rab-button-xlarge" <?php selected( $item->rab_menu_style, 'rab-button-xlarge' ); ?>><?php esc_attr_e( 'Button xLarge', 'rab' ); ?></option>
			</select>
		</label>
	</p>
	<p class="field-megamenu-icon description description-wide">
		<label for="edit-menu-item-megamenu-icon-<?php echo $item_id; ?>">
			<?php esc_attr_e( 'Menu Icon (use full font awesome name)', 'rab' ); ?>
			<input type="text" id="edit-menu-item-megamenu-icon-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-icon" name="menu-item-rab-megamenu-icon[<?php echo $item_id; ?>]" value="<?php echo $item->rab_megamenu_icon; ?>" />
		</label>
	</p>
<?php }

// Add the mega menu custom fields to the menu fields.

add_action( 'wp_nav_menu_item_custom_fields', 'rab_add_megamenu_fields', 20, 4 );


/**
 * Adds the menu markup.
 *
 * @param string $item_id The ID of the menu item.
 * @param object $item    The menu item object.
 * @param int    $depth   The depth of the current item in the menu.
 * @param array  $args    Menu arguments.
 */
function rab_add_megamenu_fields( $item_id, $item, $depth, $args ) {
	?>
	<div class="clear"></div>
	<div class="rab-mega-menu-options">
		<p class="field-megamenu-status description description-wide">
			<label for="edit-menu-item-megamenu-status-<?php echo $item_id; ?>">
				<input type="checkbox" id="edit-menu-item-megamenu-status-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-status" name="menu-item-rab-megamenu-status[<?php echo $item_id; ?>]" value="enabled" <?php checked( $item->rab_megamenu_status, 'enabled' ); ?> />
				<strong><?php esc_attr_e( 'Enable Mega Menu (Primary or main menu only)', 'rab' ); ?></strong>
			</label>
		</p>
		<p class="field-megamenu-width description description-wide">
			<label for="edit-menu-item-megamenu-width-<?php echo $item_id; ?>">
				<input type="checkbox" id="edit-menu-item-megamenu-width-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-width" name="menu-item-rab-megamenu-width[<?php echo $item_id; ?>]" value="fullwidth" <?php checked( $item->rab_megamenu_width, 'fullwidth' ); ?> />
				<?php esc_attr_e( 'Full Width Mega Menu (overrides column width)', 'rab' ); ?>
			</label>
		</p>
		<p class="field-megamenu-columns description description-wide">
			<label for="edit-menu-item-megamenu-columns-<?php echo $item_id; ?>">
				<?php esc_attr_e( 'Mega Menu Number of Columns', 'rab' ); ?>
				<select id="edit-menu-item-megamenu-columns-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-columns" name="menu-item-rab-megamenu-columns[<?php echo $item_id; ?>]">
					<option value="auto" <?php selected( $item->rab_megamenu_columns, 'auto' ); ?>><?php esc_attr_e( 'Auto', 'rab' ); ?></option>
					<option value="1" <?php selected( $item->rab_megamenu_columns, '1' ); ?>>1</option>
					<option value="2" <?php selected( $item->rab_megamenu_columns, '2' ); ?>>2</option>
					<option value="3" <?php selected( $item->rab_megamenu_columns, '3' ); ?>>3</option>
					<option value="4" <?php selected( $item->rab_megamenu_columns, '4' ); ?>>4</option>
					<option value="5" <?php selected( $item->rab_megamenu_columns, '5' ); ?>>5</option>
					<option value="6" <?php selected( $item->rab_megamenu_columns, '6' ); ?>>6</option>
				</select>
			</label>
		</p>
		<p class="field-megamenu-columnwidth description description-wide">
			<label for="edit-menu-item-megamenu-columnwidth-<?php echo $item_id; ?>">
				<?php esc_attr_e( 'Mega Menu Column Width (in percentage, ex: 30%)', 'rab' ); ?>
				<input type="text" id="edit-menu-item-megamenu-columnwidth-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-columnwidth" name="menu-item-rab-megamenu-columnwidth[<?php echo $item_id; ?>]" value="<?php echo $item->rab_megamenu_columnwidth; ?>" />
			</label>
		</p>
		<p class="field-megamenu-title description description-wide">
			<label for="edit-menu-item-megamenu-title-<?php echo $item_id; ?>">
				<input type="checkbox" id="edit-menu-item-megamenu-title-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-title" name="menu-item-rab-megamenu-title[<?php echo $item_id; ?>]" value="disabled" <?php checked( $item->rab_megamenu_title, 'disabled' ); ?> />
				<?php esc_attr_e( 'Disable Column Title', 'rab' ); ?>
			</label>
		</p>
		<p class="field-megamenu-widgetarea description description-wide">
			<label for="edit-menu-item-megamenu-widgetarea-<?php echo $item_id; ?>">
				<?php esc_attr_e( 'Mega Menu Widget Area', 'rab' ); ?>
				<select id="edit-menu-item-megamenu-widgetarea-<?php echo $item_id; ?>" class="widefat code edit-menu-item-megamenu-widgetarea" name="menu-item-rab-megamenu-widgetarea[<?php echo $item_id; ?>]">
					<option value="0"><?php esc_attr_e( 'Select Widget Area', 'rab' ); ?></option>
					<?php global $wp_registered_sidebars; ?>
					<?php if ( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ) : ?>
						<?php foreach ( $wp_registered_sidebars as $sidebar ) : ?>
							<option value="<?php echo $sidebar['id']; ?>" <?php selected( $item->rab_megamenu_widgetarea, $sidebar['id'] ); ?>><?php echo $sidebar['name']; ?></option>
						<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</label>
		</p>
		<a href="#" id="rab-media-upload-<?php echo $item_id; ?>" class="rab-open-media button button-primary rab-megamenu-upload-thumbnail"><?php esc_attr_e( 'Set Thumbnail', 'rab' ); ?></a>
		<p class="field-megamenu-thumbnail description description-wide">
			<label for="edit-menu-item-megamenu-thumbnail-<?php echo $item_id; ?>">
				<input type="hidden" id="edit-menu-item-megamenu-thumbnail-<?php echo $item_id; ?>" class="rab-new-media-image widefat code edit-menu-item-megamenu-thumbnail" name="menu-item-rab-megamenu-thumbnail[<?php echo $item_id; ?>]" value="<?php echo $item->rab_megamenu_thumbnail; ?>" />
				<img src="<?php echo $item->rab_megamenu_thumbnail; ?>" id="rab-media-img-<?php echo $item_id; ?>" class="rab-megamenu-thumbnail-image" style="<?php echo ( trim( $item->rab_megamenu_thumbnail ) ) ? 'display:inline;' : ''; ?>" />
				<a href="#" id="rab-media-remove-<?php echo $item_id; ?>" class="remove-rab-megamenu-thumbnail" style="<?php echo ( trim( $item->rab_megamenu_thumbnail ) ) ? 'display:inline;' : ''; ?>"><?php esc_attr_e( 'Remove Image', 'rab' ); ?></a>
			</label>
		</p>
	</div><!-- .rab-mega-menu-options-->
	<?php
}

/**
 * Closing php tab is removed
 */