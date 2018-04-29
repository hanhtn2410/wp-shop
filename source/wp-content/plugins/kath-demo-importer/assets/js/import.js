jQuery('[data-rab-importer]').each(function() {
    var $this   =   jQuery(this),
        item    =   $this,
        tag     =   $this.find('.rab-tag'),
        content =   $this.find('.rab-importer-response');

    $this.find('[data-import]').click(function(e) {
        e.preventDefault();

        var confrm = confirm( 'Please make sure you take backup of everything. Your default contents may be overwritten/lost. So it is strongly suggested to run importer on fresh installation of WordPress and make sure that all the plugins are installed and active before proceeding further.');
        if( confrm == true ) {
            var $this   = jQuery(this),
            demo    = $this.data('import'),
            nonce   = $this.data('nonce'),
            data = {
                action: 'kath_demo_importer',
                nonce: nonce,
                id: demo
            };

            $this.html('<span class="spinner">Please Wait...</span>');

            jQuery.post(ajaxurl, data, function(response){
                content.addClass('active');
                content.append(response);
                item.addClass('imported');
                tag.html("Imported");
            });
        }
        
    });

    jQuery('.dismiss').click(function() {
        content.removeClass('active');
    });

});
