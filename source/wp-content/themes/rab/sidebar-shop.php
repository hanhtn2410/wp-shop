<div class="sidebar-selected">
    <?php 
    $sidebar = cs_get_option( 'shop-fieldset' );
    $selected = $sidebar['shop-archive-sidebar-select'];

    if( empty( $selected ) ) {
        dynamic_sidebar( 'rab-primary-sidebar' );
    } else {
        dynamic_sidebar( $selected );
    }
    ?>
</div>
<!--left-->