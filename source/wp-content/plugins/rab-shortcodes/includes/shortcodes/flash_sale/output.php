<?php 
    
$id = rab_sc_id('flash_sale');  

$custom_class = $attributes['custom_class'];
?>


<div id="<?php echo $id; ?>" class="secondary-padding <?php echo $custom_class; ?>">
    <?php if( ! empty( $attributes['title'] ) ): ?>
        <h2><?php echo $attributes['title']; ?></h2>
    <?php endif; ?>
    <h4> <?php echo ( isset( $attributes['subtitle'] ) ) ? $attributes['subtitle'] : ''; ?></h4>
    <div class="flash-count" data-end-date="<?php echo $attributes['date']; ?>"></div>
    
</div>