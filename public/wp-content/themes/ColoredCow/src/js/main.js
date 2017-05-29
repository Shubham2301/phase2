/*! ColoredCow 2017-05-10 */

jQuery(document).ready(function() {
    jQuery('#submit_field').on('click', function() {
        RSVP();
    });
});

function RSVP() {
    var verification_form = jQuery('#verification_form');
    var dataString = verification_form.serialize();
    if (!verification_form[0].checkValidity()) {
        verification_form[0].reportValidity();
        return;
    }
    jQuery.ajax({
        type: "POST",
        url: PARAMS.ajaxurl,
        data: dataString,
        success: function(response) {
            if (response.match(/success/gi)) {
                window.alert("your response has been accepted");
            } else {
                window.alert("sorry no entry found with this credentials");
            }
        }
    });
}
