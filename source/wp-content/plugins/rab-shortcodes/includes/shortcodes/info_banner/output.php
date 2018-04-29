<?php 
    
    $id = rab_sc_id('info_banner');  
    //button_bg_color is for style1 and button_bg_border_color is for style2
    // $button_bg_color=$button_bg_border_color;
    
    $class  = array();
    $class[] = "rab-btn";
    
    switch($attributes['size'] ) {
        case 'small':
            $class[] = 'button-small';
            break;
        case 'standard':
            $class[] = 'button-medium';
            break;
        case 'large':
            $class[] = 'button-large';
            break;
    }

    switch( $attributes['alignment']) {
        case 'right':
            $class[] = 'right';
            break;
        case 'center':
            $class[] = 'center';
            break;
        case 'left':
            $class[] = 'left';
            break;
    }

    switch( $attributes['button_bg_style'] ) {
        case 'fill':
            $class[] ='fill';
            break;
        case 'transparent':
            $class[] ='transparent';
            break;
    }
    
    if(strlen($attributes['icon'])) { 
        $class[] ='hasIcon';
    }

    $custom_class = $attributes['custom_class'];
    $content_position = $attributes['content_position'];

    $content_position_class = '';
    if( $content_position === 'bottom' ) {
        $content_position_class = 'bottom-align';
    }

    $content_style = $attributes['content_style'];
    ?>

<div id="<?php echo $id; ?>" class="wrap image-effect overlay <?php echo $custom_class; ?>">
    <div class="disc text-center">
        <div class="inner">
            <div class="content <?php echo $content_position_class; ?>">
                <?php
                $link = array('url' => '#');
                if($attributes['link'] && function_exists( 'vc_build_link' ) ) {
                    $link = vc_build_link( $attributes['link'] );
                }
                ?>
                <?php 
                if( $content_style === 'inline' ):
                    echo '<div class="inline">';
                endif;
                ?>
                <a href="<?php echo $link['url']; ?>" class="cover">&nbsp;</a>
                <?php if( ! empty( $attributes['title'] ) ): ?>
                    <h2><?php echo $attributes['title']; ?></h2>
                <?php endif; ?>
                <?php  
                $content = wpb_js_remove_wpautop($content, true); 
                echo $content;
                ?>
                <div class="btn-wrap">
                    <span class="btn btn-default faa-parent animated-hover <?php echo implode(' ', $class ); ?>">
                        <?php echo $attributes['button_text']; ?>
                        <i class="icofont icofont-<?php echo $attributes['icon']; ?>"></i>
                    </span>
                </div>
                 <?php 
                if( $content_style === 'inline' ):
                    echo '</div>';
                endif;
                ?>
            </div>
        </div>
    </div>
    <!--disc-->

    <figure>
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
</div>
