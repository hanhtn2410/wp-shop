<?php
/**
 * Rab Promo Banner Widget
 *
 * Extends the WP_Widget to create new image for us
 */

if( ! defined( 'ABSPATH' ) ) {
    exit;   // exit if accessed directly
}

class Rab_Promo_Banner_Widget extends WP_Widget {

    /**
     * Rab_Promo_Banner_Widget Constructor
     */
    public function __construct() {
        $widget_ops = array('classname' => 'rab-promo-banner');
        parent::__construct(
            'rab-promo-banner', 
            __( 'RAB > Promo Banner', 'rab' ), 
            $widget_ops
        );
    }
    
    /**
     * Frontend widget display
     * 
     * @param  array $args     
     * @param  array $instance
     */
    public function widget($args, $instance) {
        extract($args);

        // widget content
        echo $before_widget;
        $link_url = $instance['link_url']; 
        ?>

        <figure class="box image-effect">
            <a href="<?php echo esc_url( $link_url ); ?>" class="link-overlay">
                <img src="<?php echo esc_url( $instance['image_uri'] ); ?>" alt="<?php echo $instance['title'] ?>">
            </a>            
        </figure>

        <?php 
   
        echo $after_widget;

    }

    /**
     * Update our widget option
     * 
     * @param  array $new_instance
     * @param  array $old_instance
     * @return array   Updated values of form
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
        $instance['link_url'] = strip_tags( $new_instance['link_url'] );

        return $instance;
    }

    /**
     * Display form in the backend
     * 
     * @param  array $instance
     */
    public function form($instance) {
        $title = ( isset( $instance['title'] ) ) ? $instance['title'] : '';
        $link = ( isset( $instance['link_url'] ) ) ? $instance['link_url'] : '#';
        $image = ( isset( $instance['image_uri'] ) ) ? $instance['image_uri'] : '';
        ?>
        <div class="rab-widget-image">
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">Title</label><br />
                <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $title; ?>" class="widefat" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('link_url'); ?>">Link Url:</label><br />
                <input type="link_url" name="<?php echo $this->get_field_name('link_url'); ?>" id="<?php echo $this->get_field_id('link_url'); ?>" value="<?php echo $link; ?>" class="widefat" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('image_uri'); ?>">Image</label><br />
                <?php
                    if ( isset( $instance['image_uri'] ) ) :
                        echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
                    endif;
                ?>

                <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $image; ?>" style="margin-top:5px;">

                <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image" style="margin-top:5px;" />
            </p>
        </div>
        <?php
    }
}

// register promo banner widget
add_action('widgets_init', 'rab_register_promo_banner_widget');
function rab_register_promo_banner_widget() {
    register_widget( 'Rab_Promo_Banner_Widget' );
}

/**
 * Closing PHP tag is omitted intentionally
 */