/* Customizer JS Upsale*/
( function( api ) {

    api.sectionConstructor['upsell'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );

jQuery(document).ready(function($){

    // Tygoraphy
	$('#_customize-input-online_clothing_store_heading_font').change(function(){

		var currentfont = this.value;

		var data = {
            'action': 'online_clothing_store_customizer_font_weight',
            'currentfont': currentfont,
            '_wpnonce': online_clothing_store_customizer.ajax_nonce,
        };
 
        $.post( ajaxurl, data, function(response) {

            if( response ){

                $('#_customize-input-online_clothing_store_heading_weight').empty();
                $('#_customize-input-online_clothing_store_heading_weight').html(response);

            }

        });

	});	

	// Archive Layout Image Control
    $('.radio-image-buttenset').each(function(){
        
        let id;
        id = $(this).attr('id');
        $( '[id='+id+']' ).buttonset();
    });

});