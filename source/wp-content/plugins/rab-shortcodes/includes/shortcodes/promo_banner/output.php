<?php
$id = rab_sc_id('promo_banner');  
?>

<div id="<?php echo $id; ?>" class="rab-promo-banner">

    <figure>
        <?php
        $link = array('url' => '#');
        if($attributes['link'] && function_exists( 'vc_build_link' ) ) {
            $link = vc_build_link( $attributes['link'] );
        }
        $image_alt = wp_strip_all_tags( $attributes['image_alt'] );
        if( empty( $image_alt ) ) {
            $image_alt = 'Promotional Banner';
        }
        $imgid = $attributes['image'];
        $target = '';
        if( $attributes['link_opens'] && $attributes['link_opens'] == 'new' ) {
            $target = 'target="_blank"';
        }
        if( $imgid ) {
            $image = wp_get_attachment_image_src( $imgid, 'full' );
            echo '<a href="'.$link['url'].'" '.$target.'>';
            echo '<img alt="'.$image_alt.'" src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'">';
            echo '</a>';
        } else {
            ?>
            <a href="<?php echo $link['url']; ?>">
                <img src="<?php echo RAB_IMAGES; ?>fashion/cat1.jpg" alt="Promo banner">
            </a>
            <?php
        }
        ?>
        
    </figure>
</div>
