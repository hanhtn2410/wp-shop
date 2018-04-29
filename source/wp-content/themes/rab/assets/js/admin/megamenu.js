( function( $ ) {

	"use strict";

	$( document ).ready( function() {

		// show or hide megamenu fields on parent and child list items
		rab.menu_item_mouseup();
		rab.megamenu_status_update();
		rab.megamenu_fullwidth_update();
		rab.update_megamenu_fields();

		// setup automatic thumbnail handling
		$( '.remove-rab-megamenu-thumbnail' ).manage_thumbnail_display();
		$( '.rab-megamenu-thumbnail-image' ).css( 'display', 'block' );
		$( ".rab-megamenu-thumbnail-image[src='']" ).css( 'display', 'none' );

		// setup new media uploader frame
		rab_media_frame_setup();
	});

	// "extending" wpNavMenu
	var rab = {

		menu_item_mouseup: function() {
			$( document ).on( 'mouseup', '.menu-item-bar', function( event, ui ) {
				if( ! $( event.target ).is( 'a' )) {
					setTimeout( rab.update_megamenu_fields, 300 );
				}
			});
		},

		megamenu_status_update: function() {

			$( document ).on( 'click', '.edit-menu-item-megamenu-status', function() {
				var parent_li_item = $( this ).parents( '.menu-item:eq( 0 )' );

				if( $( this ).is( ':checked' ) ) {
					parent_li_item.addClass( 'rab-megamenu' );
				} else 	{
					parent_li_item.removeClass( 'rab-megamenu' );
				}

				rab.update_megamenu_fields();
			});
		},

		megamenu_fullwidth_update: function() {

			$( document ).on( 'click', '.edit-menu-item-megamenu-width', function() {
				var parent_li_item = $( this ).parents( '.menu-item:eq( 0 )' );

				if( $( this ).is( ':checked' ) ) {
					parent_li_item.addClass( 'rab-megamenu-fullwidth' );
				} else 	{
					parent_li_item.removeClass( 'rab-megamenu-fullwidth' );
				}

				rab.update_megamenu_fields();
			});
		},

		update_megamenu_fields: function() {
			var menu_li_items = $( '.menu-item');

			menu_li_items.each( function( i ) 	{

				var megamenu_status = $( '.edit-menu-item-megamenu-status', this );
				var megamenu_fullwidth = $( '.edit-menu-item-megamenu-width', this );

				if( ! $( this ).is( '.menu-item-depth-0' ) ) {
					var check_against = menu_li_items.filter( ':eq(' + (i-1) + ')' );

					if( check_against.is( '.rab-megamenu' ) ) {
						megamenu_status.attr( 'checked', 'checked' );
						$( this ).addClass( 'rab-megamenu' );
					} else {
						megamenu_status.attr( 'checked', '' );
						$( this ).removeClass( 'rab-megamenu' );
					}

					if( check_against.is( '.rab-megamenu-fullwidth' ) ) {
						megamenu_fullwidth.attr( 'checked', 'checked' );
						$( this ).addClass( 'rab-megamenu-fullwidth' );
					} else {
						megamenu_fullwidth.attr( 'checked', '' );
						$( this ).removeClass( 'rab-megamenu-fullwidth' );
					}
				} else {
					if( megamenu_status.attr( 'checked' ) ) {
						$( this ).addClass( 'rab-megamenu' );
					}

					if( megamenu_fullwidth.attr( 'checked' ) ) {
						$( this ).addClass( 'rab-megamenu-fullwidth' );
					}
				}
			});
		}

	};

	$.fn.manage_thumbnail_display = function( variables ) {
		var button_id;

		return this.click( function( e ){
			e.preventDefault();

			button_id = this.id.replace( 'rab-media-remove-', '' );
			$( '#edit-menu-item-megamenu-thumbnail-'+button_id ).val( '' );
			$( '#rab-media-img-'+button_id ).attr( 'src', '' ).css( 'display', 'none' );
		});
	}

	function rab_media_frame_setup() {
		var rab_media_frame;
		var item_id;

		$( document.body ).on( 'click.rabOpenMediaManager', '.rab-open-media', function(e){

			e.preventDefault();

			item_id = this.id.replace('rab-media-upload-', '');

			if ( rab_media_frame ) {
				rab_media_frame.open();
				return;
			}

			rab_media_frame = wp.media.frames.rab_media_frame = wp.media({

				className: 'media-frame rab-media-frame',
				frame: 'select',
				multiple: false,
				library: {
					type: 'image'
				}
			});

			rab_media_frame.on('select', function(){

				var media_attachment = rab_media_frame.state().get('selection').first().toJSON();

				$( '#edit-menu-item-megamenu-thumbnail-'+item_id ).val( media_attachment.url );
				$( '#rab-media-img-'+item_id ).attr( 'src', media_attachment.url ).css( 'display', 'block' );

			});

			rab_media_frame.open();
		});

	}
})( jQuery );