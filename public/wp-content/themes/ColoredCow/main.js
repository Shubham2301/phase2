/*! ColoredCow 2017-05-10 */
jQuery(document).ready(function() {
    console.log("in main.js");
    console.log(PARAMS.ajaxurl);
    jQuery('#save_id').on('click', function() {
        var add_subscriber_form = jQuery('#add_subscriber_form');
        if (!add_subscriber_form[0].checkValidity()) {
            add_subscriber_form[0].reportValidity();
            return;
        }
        console.log('clicked');
        console.log(jQuery('#add_subscriber_form').serialize());
        // return;
        jQuery.ajax({
            type: "POST",
            url: PARAMS.ajaxurl,
            data: add_subscriber_form.serialize(),
            success: function(response) {
                //var data = response.data;
                console.log("ajax request successful");

            }
        });
    });
});
