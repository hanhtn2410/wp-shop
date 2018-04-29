<?php 
    
$id = rab_sc_id('category_banner');  

$custom_class = $attributes['custom_class'];
?>

<div id="<?php echo $id; ?>" class="trending-wrap mb-55 <?php echo $custom_class; ?>">
    <?php
    $link = array('url' => '#');
    if($attributes['link'] && function_exists( 'vc_build_link' ) ) {
        $link = vc_build_link( $attributes['link'] );
    }
    ?>
   <a href="<?php echo $link['url']; ?>" class="link-mask">&nbsp;</a>
   <figure class="image-effect">
        <?php 
        $imgid = $attributes['image'];
        if( $imgid ) {
            $image = wp_get_attachment_image_src( $imgid, 'full' );
            echo '<img src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'" alt="'.$attributes['title'].'">';
        } else {
            ?>
            <img src="<?php echo RAB_IMAGES; ?>fashion/cat1.jpg" alt="<?php echo $attributes['title']; ?>">
            <?php
        }
        ?>
        
    </figure>

   <div class="content text-center">
        <?php if( ! empty( $attributes['title'] ) ): ?>
            <h4 class="mb-0"><?php echo $attributes['title']; ?></h4>
        <?php endif; ?>
       <h6 class="mb-0 font-ar">
           <?php echo ( isset( $attributes['subtitle'] ) ) ? $attributes['subtitle'] : ''; ?>
       </h6>
   </div>
</div>
