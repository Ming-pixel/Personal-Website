jQuery( document ).ready(function() {
    jQuery( ".contact_loading").hide();
    $("#contact_main_form").html5Validate(function() {
//    jQuery( "#contact_main_form" ).submit(function(event) {
        jQuery( ".contact_loading").show();
        jQuery.post( contact_massages.ajaxurl, jQuery("#contact_main_form :input").serialize() )
            .done(function() {
                jQuery( ".contact_loading").hide();
                var msg = jQuery(".formmessage").html('<span class="successfully">Thanks. Your Message Sent Successfully.</span>');
                setTimeout(function(){
                      msg.hide();}, 8000
                );
            })
            .fail(function() {
                jQuery( ".contact_loading").hide();
                var msg = jQuery(".formmessage").html('<span class="wrong">Oops, something went wrong.</span>');
                setTimeout(function(){
                  msg.hide();}, 8000
                );
            });
        event.preventDefault();
    });
});