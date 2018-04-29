<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;    // exit if accessed directly
}

require_once get_parent_theme_file_path( 'inc/lib/megamenu/class-ktc-megamenu-core.php' );
require_once get_parent_theme_file_path( 'inc/lib/megamenu/class-ktc-megamenu.php' );
require_once get_parent_theme_file_path( 'inc/lib/megamenu/class-ktc-nav-walker-megamenu.php' );
require_once get_parent_theme_file_path( 'inc/lib/megamenu/class-ktc-nav-walker.php' );
require_once get_parent_theme_file_path( 'inc/lib/megamenu/mega-menus.php' );

new Ktc_Megamenu_Core();
new Ktc_Nav_Walker_Megamenu();
